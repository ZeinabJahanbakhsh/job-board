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
                'code' => 'is_admin'
            ],
            [
                'name' => 'is_employer',
                'code' => 'is_employer'
            ],
            [
                'name' => 'is_candidate',
                'code' => 'is_candidate'
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
