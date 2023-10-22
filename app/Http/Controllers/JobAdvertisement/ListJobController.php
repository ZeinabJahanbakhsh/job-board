<?php

namespace App\Http\Controllers\JobAdvertisement;

use App\Http\Controllers\Controller;
use App\Models\Employer\Employer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class ListJobController extends Controller
{
    public function index(): Application|Factory|View
    {
        $employers= Employer::latest()->paginate('10', ['*'], 'pages');
        return view('job-advertisements.list-jobs', compact('employers'));
    }

    public function show(Employer $employer): Application|Factory|View
    {
        return view('job-advertisements.show-job', compact('employer'));
    }




}
