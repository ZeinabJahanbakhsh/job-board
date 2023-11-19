<?php

namespace Database\Seeders\Permission;

use App\Models\Permission\PermissionUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionUserTableSeeder extends Seeder
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
                'user_id'       => 1,
                'permission_id' => 1
            ],
            [
                'user_id'       => 2,
                'permission_id' => 2
            ],
            [
                'user_id'       => 3,
                'permission_id' => 3
            ]
        ]);

        $data->each(function ($value) {
            PermissionUser::create([
                'user_id'       => $value['user_id'],
                'permission_id' => $value['permission_id'],
            ]);
        });

    }
}
