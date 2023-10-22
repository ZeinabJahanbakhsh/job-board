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
        $data = collect([
            [
                'title'           => fake()->jobTitle(),
                'description'     => fake()->text('600'),
                'email'           => "employer@employer.com",
                'phone'           => fake()->phoneNumber(),
                'company_name'    => fake()->company,
                'company_address' => fake()->address
            ],
            [
                'title'           => fake()->jobTitle(),
                'email'           => fake()->companyEmail,
                'phone'           => fake()->phoneNumber,
                'company_name'    => fake()->company,
                'company_address' => fake()->address,
                'description'     => fake()->text('600')
            ],
            [
                'title'           => fake()->jobTitle(),
                'email'           => fake()->companyEmail,
                'phone'           => fake()->phoneNumber,
                'company_name'    => fake()->company,
                'company_address' => fake()->address,
                'description'     => fake()->text('600')
            ],
            [
                'title'           => fake()->jobTitle(),
                'email'           => fake()->companyEmail,
                'phone'           => fake()->phoneNumber,
                'company_name'    => fake()->company,
                'company_address' => fake()->address,
                'description'     => fake()->text('600')
            ],
            [
                'title'           => fake()->jobTitle(),
                'email'           => fake()->companyEmail,
                'phone'           => fake()->phoneNumber,
                'company_name'    => fake()->company,
                'company_address' => fake()->address,
                'description'     => fake()->text('600')
            ],
        ]);

        $data->each(function ($value) {
            Employer::create([
                'title'           => $value['title'],
                'description'     => $value['description'],
                'email'           => $value['email'],
                'phone'           => $value['phone'],
                'company_name'    => $value['company_name'],
                'company_address' => $value['company_address'],
            ]);
        });
    }


}
