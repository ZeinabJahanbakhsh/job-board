<?php

namespace Database\Factories;

use App\Models\Candidate\Candidate;
use App\Models\Employer\Employer;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class CandidateEmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidate_id' => Candidate::all()->random(1)->value('id'),
            'employer_id'  => Employer::all()->random(1)->value('id'),
        ];
    }
}
