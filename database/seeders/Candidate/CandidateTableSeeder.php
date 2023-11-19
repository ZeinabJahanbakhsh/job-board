<?php

namespace Database\Seeders\Candidate;

use App\Models\Candidate\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;


class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Candidate::create([
            'first_name' => "candidate",
            'last_name'  => "candidate",
            'email'      => "candidate@candidate.com",
            'mobile'     => fake()->phoneNumber(),
            'file'       => UploadedFile::fake()->create(fake()->monthName . '.pdf')->store('seeder-resumes'),
        ]);

    }


}
