<?php

namespace Database\Seeders;

use App\Models\Candidate\Candidate;
use App\Models\CandidateEmployer;
use App\Models\Employer\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateEmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return CandidateEmployer
     */
    public function run(): CandidateEmployer
    {
        return CandidateEmployer::create([
            'candidate_id' => Candidate::all()->random('1')->value('id'),
            'employer_id'  => Employer::all()->random('1')->value('id'),
        ]);
    }

}
