<?php

namespace App\Models\Permission;

use App\Enums\PermissionEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Permission extends Model
{
    protected $fillable = ['name'];
    protected $casts    = [
        'code' => PermissionEnum::class
    ];


    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'permission_user')
                    ->using(PermissionUser::class)
                    ->withTimestamps();
    }


}
