<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'company_address',
        'company_name',
    ];


    /*
   |--------------------------------------------------------------------------
   | Relations
   |--------------------------------------------------------------------------
   */

    public function advertisements(): HasMany
    {
        return $this->hasMany(Advertisement::class);
    }


   /*
   |--------------------------------------------------------------------------
   | Virtual Attributes
   |--------------------------------------------------------------------------
   */
    public function getFullNameAttribute(): string
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }


}
