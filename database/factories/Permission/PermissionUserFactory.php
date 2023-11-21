<?php

namespace Database\Factories\Permission;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission\PermissionUser>
 */
class PermissionUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $permission['employer'] = [
            'user_id'       => User::whereNull('candidate_id')
                                   ->whereNotNull('employer_id')
                                   ->get()
                                   ->random('1')
                                   ->value('id'),
            'permission_id' => 2
        ];

        $permission['candidate'] = [
            'user_id'       => User::whereNull('employer_id')
                                   ->whereNotNull('candidate_id')
                                   ->get()
                                   ->random('1')
                                   ->value('id'),
            'permission_id' => 3
        ];

        $permission['admin'] = [
            'user_id'       => 1,
            'permission_id' => 1
        ];

        return $permission[array_rand($permission)];
    }
}
