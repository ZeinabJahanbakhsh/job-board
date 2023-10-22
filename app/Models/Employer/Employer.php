<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
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
