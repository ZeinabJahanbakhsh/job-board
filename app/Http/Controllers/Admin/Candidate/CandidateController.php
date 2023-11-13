<?php

namespace App\Http\Controllers\Admin\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate\Candidate;
use App\Models\Employer\Advertisement;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;


class CandidateController extends Controller
{
    public function sendResume(Request $request): Application|Factory|View
    {
        return view('candidates.send-resume');
    }


    public function storeResume(Request $request, Candidate $candidate, Advertisement $advertisement)
    {
        /*$request->validate([
            'pc-file' =>'required|mimes:pdf|max:1024',
        ]);*/

        //check resume sent or not!
        $advertisementIds = [];
        foreach ($candidate->advertisements as $value) {
            $advertisementIds[] = $value->pivot->advertisement_id;
            //array_push($advertisementIds, $value->pivot->advertisement_id) ;
        }

        if (in_array($advertisement->id, $advertisementIds, TRUE)) {
            return view('candidates.send-resume', ['status' => __('messages.failed.send-resume')]);
        }


        //***Insert resume

        //*** Upload resume from ur pc!
        if ($request->file('pc-file')) {
            $fileName = time() . '.' . $request->file('pc-file')->extension();
            $path     = $request->file('pc-file')->storeAs('uploads-cv', $fileName);   //storage/app/uploads-cv/file.png

            $candidate->forceFill([
                'file' => '/storage/' . $path
            ])->save();

            $candidate->advertisements()->attach($advertisement->id);
        }

        //*** Upload resume from ur dashboard
        if ($request->input('dashboard-file')) {
            $candidate->advertisements()->attach($advertisement->id);
        }

        //candidate_employer
        $candidate->employers()->attach($advertisement->employer->id);

        $submittedResumes = $this->submittedResumes($candidate);
        return view('candidates.all-resumes', compact('submittedResumes'));
    }

    public function get(Candidate $candidate): Application|Factory|View
    {
        $submittedResumes = $this->submittedResumes($candidate);
        return view('candidates.all-resumes', compact('submittedResumes'));
    }

    public function submittedResumes(Candidate $candidate): array|\Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\LaravelIdea\Helper\App\Models\Employer\_IH_Advertisement_C
    {
        return $candidate->advertisements()
                         ->with(['employer'])
                         ->paginate('10', ['*'], 'page');
    }


}
