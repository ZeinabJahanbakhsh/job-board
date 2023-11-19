<?php

namespace Database\Seeders\Role;

use App\Models\Role\RoleUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = collect([
            [
                'user_id' => 1,
                'role_id' => 1
            ],
            [
                'user_id' => 2,
                'role_id' => 2
            ],
            [
                'user_id' => 3,
                'role_id' => 3
            ],
        ]);

        $data->each(function ($value) {
            RoleUser::create([
                'user_id' => $value['user_id'],
                'role_id' => $value['role_id']
            ]);
        });
    }

}
