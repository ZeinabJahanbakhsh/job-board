<?php

namespace Database\Seeders;

use App\Models\Candidate\Candidate;
use App\Models\Employer\Employer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = collect([
            [
                'name'              => "administrator",
                'email'             => "admin@admin.com",
                'employer_id'       => null,
                'candidate_id'      => null,
                'email_verified_at' => now(),
                'password'          => bcrypt('123456'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => "employer",
                'email'             => "employer@employer.com",
                'employer_id'       => 1,
                'candidate_id'      => null,
                'email_verified_at' => now(),
                'password'          => bcrypt('123456'),
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => "candidate",
                'email'             => "candidate@candidate.com",
                'employer_id'       => null,
                'candidate_id'      => 1,
                'email_verified_at' => now(),
                'password'          => bcrypt('123456'),
                'remember_token'    => Str::random(10),
            ],
        ]);

        $data->each(function ($value) {
            User::create([
                'name'              => $value['name'],
                'email'             => $value['email'],
                'employer_id'       => $value['employer_id'],
                'candidate_id'      => $value['candidate_id'],
                'email_verified_at' => $value['email_verified_at'],
                'password'          => $value['password'],
                'remember_token'    => $value['remember_token'],
            ]);
        });
    }

}
