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
            'user_id'       => User::where('candidate_id', null)->get()->random('1')->value('id'),
            'permission_id' => 2
        ];

        $permission['candidate'] = [
            'user_id'       => User::where('employer_id', null)->get()->random('1')->value('id'),
            'permission_id' => 3
        ];

        $permission['admin'] = [
            'user_id'       => User::where('employer_id', null)
                                   ->where('candidate_id', null)
                                   ->get()
                                   ->random(1)
                                   ->value('id'),
            'permission_id' => 1
        ];

        return $permission[array_rand($permission)];
    }
}
