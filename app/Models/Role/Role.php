<?php

namespace App\Models\Role;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Role extends Model
{
    protected $fillable = ['name'];

    protected $casts = [
        'code' => RoleEnum::class,
    ];


   /*
   |--------------------------------------------------------------------------
   | Relations
   |--------------------------------------------------------------------------
   */

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user')
            ->using(RoleUser::class)
            ->withTimestamps();

    }



    /*
   |--------------------------------------------------------------------------
   | Scopes
   |--------------------------------------------------------------------------
   */
    public function scopeAdminRole($query)
    {
        return $query->where('code', RoleEnum::Admin);
    }

    public function scopeEmployerRole($query)
    {
        return $query->where('code', RoleEnum::Employer);
    }

    public function scopeCandidateRole($query)
    {
        return $query->where('code', RoleEnum::Candidate);
    }



}
