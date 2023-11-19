<?php

namespace Database\Factories;

use App\Models\AdvertisementCandidate;
use App\Models\Candidate\Candidate;
use App\Models\Employer\Advertisement;
use App\Models\Employer\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Model>
 */
class AdvertisementCandidateFactory extends Factory
{

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'candidate_id'     => Candidate::all()->random('1')->value('id'),
            'advertisement_id' => Advertisement::all()->random('1')->value('id'),
        ];
    }

}
