<?php

namespace App\Http\Controllers\JobAdvertisement;

use App\Http\Controllers\Controller;
use App\Models\Employer\Advertisement;
use App\Models\Employer\Employer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class ListAdvertisementController extends Controller
{
    public function index(): Application|Factory|View
    {
        $allAdvertisements = Advertisement::with([
            'tags',
            'employer'
        ])
                                          ->orderBy('id', 'DESC')
                                          ->paginate('10', ['*'], 'pages');

        return view('job-advertisements.list-advertisements', compact('allAdvertisements'));
    }

    public function show(Advertisement $advertisement): Application|Factory|View
    {
        $advertisementData = $advertisement->load([
            'employer',
            'tags'
        ]);

        return view('job-advertisements.show-advertisement', compact('advertisementData'));
    }


}
