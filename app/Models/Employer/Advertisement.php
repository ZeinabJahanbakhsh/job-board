<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    protected $casts = [
        'employer_id' => 'integer'
    ];


    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }


}
