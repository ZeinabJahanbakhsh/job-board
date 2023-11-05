<?php

namespace Database\Seeders;

use App\Models\AdvertisementCandidate;
use App\Models\Candidate\Candidate;
use App\Models\Employer\Advertisement;
use App\Models\Employer\AdvertisementTag;
use App\Models\Employer\Category;
use App\Models\Employer\Employer;
use App\Models\User;
use Database\Seeders\Permission\PermissionTableSeeder;
use Database\Seeders\Role\RoleTableSeeder;
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
            PermissionTableSeeder::class,
            RoleTableSeeder::class
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
