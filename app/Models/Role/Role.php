<?php

namespace App\Models\Role;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $fillable = ['name'];

    protected $casts = [
        'code' => RoleEnum::class,
    ];

}
