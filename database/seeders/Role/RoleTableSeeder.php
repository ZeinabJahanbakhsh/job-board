<?php

namespace Database\Seeders\Role;

use App\Models\Role\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
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
                'name' => 'employer',
                'code' => 'EMPLOYER'
            ],
            [
                'name' => 'candidate',
                'code' => 'CANDIDATE'
            ],
            [
                'name' => 'admin',
                'code' => 'ADMIN'
            ]
        ]);

        $data->each(function ($value){
           Role::create([
               'name' => $value['name'],
               'code' => $value['code']
           ]);
        });

    }


}
