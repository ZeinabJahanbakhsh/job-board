<?php

namespace Database\Factories\Candidate;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;


/**
 * @extends Factory<Model>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name'  => $this->faker->lastName,
            'email'      => $this->faker->email,
            'mobile'     => $this->faker->phoneNumber,
            'file'       =>  UploadedFile::fake()->create(fake()->monthName . '.pdf')->store('factory-resumes')
        ];
    }
}
