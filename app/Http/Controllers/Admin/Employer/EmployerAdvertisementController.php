<?php

namespace App\Http\Controllers\Admin\Employer;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementCandidate;
use App\Models\Candidate\Candidate;
use App\Models\Employer\Advertisement;
use App\Models\Employer\Category;
use App\Models\Employer\Employer;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Storage;
use Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class EmployerAdvertisementController extends Controller
{
    public function index(Employer $employer): Application|Factory|View
    {
        $advertisementsOfEmployer = $employer->advertisements()
                                             ->with('category')
                                             ->paginate('10', ['*'], 'page');

        return view('employer.all-advertisement', compact('advertisementsOfEmployer'));
    }

    public function edit(Employer $employer, Advertisement $advertisement): Application|Factory|View
    {
        $advertisementData = $advertisement->load('category');
        $allCategories     = Category::all();
        return view('employer.edit-advertisement', compact('advertisementData', 'allCategories'));
    }

    public function update(Request $request, Employer $employer, Advertisement $advertisement): RedirectResponse
    {
        abort_if(
            $employer->id != $advertisement->employer_id,
            404,
            __('messages.failed.operation')
        );

        $this->getValidation($request);

        $advertisement->forceFill([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->integer('category_id'),
        ])->save();

        return redirect()->route('all-advertisements', [$employer, $advertisement]);
    }

    public function create(Employer $employer): Application|Factory|View
    {
        $categories = Category::all();
        return view('employer.create-advertisement', compact('employer', 'categories'));
    }

    public function store(Request $request, Employer $employer): RedirectResponse
    {
        $this->getValidation($request);

        $employer->advertisements()->forceCreate([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->integer('category_id')
        ]);

        return redirect()->route('all-advertisements', $employer);
    }

    public function getValidation(Request $request): void
    {
        $this->validate($request, [
            'title'       => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:10000'],
            'category_id' => ['required', 'integer', Rule::exists(Category::class, 'id')],
        ]);
    }

    public function destroy(Employer $employer, Advertisement $advertisement): RedirectResponse
    {
        abort_if(
            $employer->id != $advertisement->employer_id,
            404,
            __('messages.failed.operation')
        );

        $advertisement->delete();

        return redirect()->route('all-advertisements', $employer);
    }

    public function get(Employer $employer): Application|Factory|View
    {
        $allReceivedCandidateResumes = $employer->candidates()->paginate('10', ['*'], 'page');
        return view('employer.received-resumes', compact('allReceivedCandidateResumes'));
    }

    public function showPdfFile($candidate): BinaryFileResponse
    {
        $candidate = Candidate::query()->findOrFail($candidate);
        return response()->download(storage_path('app/' . $candidate->file));
    }


}
