<?php

namespace Database\Seeders;

use App\Models\AdvertisementCandidate;
use App\Models\Employer\Advertisement;
use App\Models\Employer\Category;
use Database\Seeders\Candidate\CandidateTableSeeder;
use Database\Seeders\Employer\EmployerTableSeeder;
use Database\Seeders\Permission\PermissionTableSeeder;
use Database\Seeders\Permission\PermissionUserTableSeeder;
use Database\Seeders\Role\RoleTableSeeder;
use Database\Seeders\Role\RoleUserTableSeeder;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('categories')->truncate();
        Category::factory(5)->create();

        DB::table('employers')->truncate();
        DB::table('candidates')->truncate();
        DB::table('candidate_employer')->truncate();
        DB::table('users')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();

        $this->call([
            EmployerTableSeeder::class,
            CandidateTableSeeder::class,
            CandidateEmployerTableSeeder::class,
            UserTableSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            PermissionUserTableSeeder::class,
            RoleUserTableSeeder::class,
        ]);

        DB::table('advertisements')->truncate();
        Advertisement::factory(5)->create();

        DB::table('advertisement_candidate')->truncate();
        AdvertisementCandidate::factory(5)->create();

        Schema::enableForeignKeyConstraints();
    }


}
