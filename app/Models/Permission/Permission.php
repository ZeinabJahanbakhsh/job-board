<?php

namespace App\Models\Permission;

use App\Enums\PermissionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];
    protected $casts = [
    'code' => PermissionEnum::class
    ];

}
