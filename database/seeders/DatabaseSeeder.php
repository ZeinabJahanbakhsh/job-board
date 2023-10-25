<?php

namespace Database\Seeders;

use App\Models\AdvertisementCandidate;
use App\Models\Candidate\Candidate;
use App\Models\CandidateEmployer;
use App\Models\Employer\Advertisement;
use App\Models\Employer\AdvertisementTag;
use App\Models\Employer\Employer;
use App\Models\Employer\Tag;
use App\Models\User;
use Database\Seeders\Candidate\CandidateTableSeeder;
use Database\Seeders\Employer\EmployerTableSeeder;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('employers')->truncate();
        Employer::factory(30)->create();

        DB::table('candidates')->truncate();
        Candidate::factory(30)->create();

        DB::table('users')->truncate();
        User::factory('20')->create();

        DB::table('tags')->truncate();
        Tag::factory(30)->create();

        DB::table('advertisements')->truncate();
        Advertisement::factory(30)->create();

        DB::table('advertisement_candidate')->truncate();
        AdvertisementCandidate::factory(30)->create();

        DB::table('advertisement_tag')->truncate();
        AdvertisementTag::factory(20)->create();


        $this->call([
            UserTableSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
