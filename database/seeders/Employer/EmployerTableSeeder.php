<?php

namespace Database\Seeders\Employer;

use App\Models\Employer\Employer;
use Illuminate\Database\Seeder;


class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Employer::create([
            'email'           => "employer@employer.com",
            'website'         => fake()->url(),
            'phone'           => fake()->phoneNumber(),
            'company_name'    => fake()->company,
            'company_address' => fake()->address
        ]);

    }


}
