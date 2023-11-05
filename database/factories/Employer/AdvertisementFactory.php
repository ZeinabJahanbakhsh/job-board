<?php

namespace Database\Factories\Employer;

use App\Models\Employer\Category;
use App\Models\Employer\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::all()->random('1')->value('id'),
            'category_id' => Category::all()->random('1')->value('id'),
            'title'       => $this->faker->jobTitle,
            'description' => $this->faker->text('2000')
        ];
    }
}
