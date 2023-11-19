<?php

namespace Database\Seeders;

use App\Models\AdvertisementCandidate;
use App\Models\Candidate\Candidate;
use App\Models\CandidateEmployer;
use App\Models\Employer\Advertisement;
use App\Models\Employer\Category;
use App\Models\Employer\Employer;
use App\Models\Permission\PermissionUser;
use App\Models\Role\RoleUser;
use App\Models\User;
use Database\Seeders\Candidate\CandidateTableSeeder;
use Database\Seeders\Employer\EmployerTableSeeder;
use Database\Seeders\Permission\PermissionTableSeeder;
use Database\Seeders\Role\RoleTableSeeder;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AdditionalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
        User::factory(30)->create();

        DB::table('candidate_employer')->truncate();
        CandidateEmployer::factory(30)->create();

        DB::table('categories')->truncate();
        Category::factory(30)->create();

        DB::table('advertisements')->truncate();
        Advertisement::factory(30)->create();

        DB::table('advertisement_candidate')->truncate();
        AdvertisementCandidate::factory(30)->create();

        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();

        $this->call([
            UserTableSeeder::class,
            EmployerTableSeeder::class,
            CandidateTableSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class
        ]);

        DB::table('permission_user')->truncate();
        PermissionUser::factory(30)->create();

        DB::table('role_user')->truncate();
        RoleUser::factory(30)->create();

        Schema::enableForeignKeyConstraints();
    }
}
