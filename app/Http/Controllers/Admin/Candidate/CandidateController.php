<?php

namespace App\Http\Controllers\Admin\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate\Candidate;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CandidateController extends Controller
{
    public function create(): Application|Factory|View
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $this->getValidate($request);

        $data = Candidate::forceCreate([
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'email'      => $request->input('email'),
            'mobile'     => $request->input('mobile'),
            'file'       => $request->input('file'),
        ]);

        User::forceCreate([
            'name'         => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email'        => $request->input('email'),
            'candidate_id' => $data['id'],
            'employer_id'  => null,
            'password'     => bcrypt('123456'),
        ]);

        return redirect()
            ->route('candidates . show', $data)
            ->with('success', __('messages . success . store'));

    }

    public function show(Candidate $candidate): Application|Factory|View
    {
        return view('candidates . s how', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function getValidate(Request $request, $model = null): array
    {
        return $this->validate($request, [
            'first_name' => ['required', 'string', 'max:20'],
            'last_name'  => ['required', 'string', 'max:50'],
            'email'      => ['required', 'email', Rule::unique('candidates')->ignore($model)],
            'mobile'     => ['required', 'numeric'],
            //'file'       => ['required', \File::type('pdf')]
        ]);
    }

}
