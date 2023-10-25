<?php

namespace Database\Factories;

use App\Models\Candidate\Candidate;
use App\Models\Employer\Employer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users['employer'] = [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'employer_id'       => Employer::all()->random('1')->value('id'),
            'candidate_id'      => null,
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
            'remember_token'    => Str::random(10),
        ];

        $users['candidate'] = [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'employer_id'       => null,
            'candidate_id'      => Candidate::all()->random('1')->value('id'),
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
            'remember_token'    => Str::random(10),
        ];

        /*$users = [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'employer_id'       => Employer::all()->random(1)->value('id') ,
            'candidate_id'      => Candidate::all()->random(1)->value('id'),
            'password'          => bcrypt('123456'),
            'remember_token'    => Str::random(10),
        ];*/

       /* if ($users['employer_id']) {
            $users['candidate_id'] = null;
        }
        if($users['candidate_id']){
            $users['employer_id'] = null;
        }*/

        //dd( array_rand($users)); //candidate
        return $users[ array_rand($users)];

        /*return [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'employer_id'       => Employer::all()->random('1')->value('id'),
            'candidate_id'      => Candidate::all()->random('1')->value('id'),
            'email_verified_at' => now(),
            'password'          => bcrypt('123456'),
            'remember_token'    => Str::random(10),
        ];*/
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
