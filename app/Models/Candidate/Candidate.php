<?php

namespace App\Models\Candidate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'file',
    ];


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
