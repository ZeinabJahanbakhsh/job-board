<?php

namespace Database\Seeders\Permission;

use App\Models\Permission\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
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
                'name' => 'is_admin',
                'code' => 'IS_ADMIN'
            ],
            [
                'name' => 'is_employer',
                'code' => 'IS_EMPLOYER'
            ],
            [
                'name' => 'is_candidate',
                'code' => 'IS_CANDIDATE'
            ],
        ]);

        $data->each(function ($value) {
           Permission::create([
               'name' => $value['name'],
               'code' => $value['code']
           ]);
        });

    }
}
