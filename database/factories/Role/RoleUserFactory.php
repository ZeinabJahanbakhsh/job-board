<?php

namespace Database\Factories\Role;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleUserFactory extends Factory
{
    public function definition(): array
    {
        $role['employer'] = [
            'user_id' => User::where('candidate_id', null)->get()->random(1)->value('id'),
            'role_id' => 2
        ];

        $role['candidate'] = [
            'user_id' => User::where('employer_id', null)->get()->random(1)->value('id'),
            'role_id' => 3
        ];

        $role['admin'] = [
            'user_id' => User::where('employer_id', null)
                             ->where('candidate_id', null)
                             ->get()
                             ->random(1)
                             ->value('id'),
            'role_id' => 1
        ];

        return $role[array_rand($role)];
    }
}
