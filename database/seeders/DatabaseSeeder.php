<?php

namespace Database\Seeders;

use App\Models\Candidate\Candidate;
use App\Models\Employer\Employer;
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
        Employer::factory(20)->create();

        DB::table('candidates')->truncate();
        Candidate::factory(20)->create();

        DB::table('users')->truncate();

        $this->call([
            //EmployerTableSeeder::class,
            //CandidateTableSeeder::class,
            UserTableSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
