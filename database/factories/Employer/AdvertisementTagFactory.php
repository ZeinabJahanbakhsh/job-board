<?php

namespace Database\Factories\Employer;

use App\Models\Employer\Advertisement;
use App\Models\Employer\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementTagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'advertisement_id' => Advertisement::all()->random('1')->value('id'),
            'tag_id'           => Tag::all()->random('1')->value('id'),
        ];
    }
}
