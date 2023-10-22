<?php

namespace Database\Factories\Employer;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;


/**
 * @extends Factory<Model>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'           => $this->faker->jobTitle,
            'description'     => $this->faker->text(2000),
            'email'           => $this->faker->companyEmail,
            'website'         => $this->faker->url(),
            'phone'           => $this->faker->phoneNumber,
            'company_name'    => $this->faker->company,
            'company_address' => $this->faker->address,
        ];
    }
}
