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
use Database\Seeders\Permission\PermissionUserTableSeeder;
use Database\Seeders\Role\RoleTableSeeder;
use Database\Seeders\Role\RoleUserTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('candidates')->truncate();
        DB::table('candidate_employer')->truncate();
        DB::table('users')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();
        DB::table('categories')->truncate();
        DB::table('advertisements')->truncate();
        DB::table('advertisement_candidate')->truncate();

        $this->call([
            EmployerTableSeeder::class,
            CandidateTableSeeder::class,
            CandidateEmployerTableSeeder::class,
            UserTableSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            RoleUserTableSeeder::class,
            PermissionUserTableSeeder::class
        ]);

        Employer::factory(30)->create();
        Candidate::factory(30)->create();
        User::factory(30)->create();
        PermissionUser::factory(30)->create();
        RoleUser::factory(30)->create();

        CandidateEmployer::factory(30)->create();
        Category::factory(30)->create();
        Advertisement::factory(30)->create();
        AdvertisementCandidate::factory(30)->create();

        Schema::enableForeignKeyConstraints();
    }
}
