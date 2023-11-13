<?php

namespace App\Models\Candidate;

use App\Models\AdvertisementCandidate;
use App\Models\CandidateEmployer;
use App\Models\Employer\Advertisement;
use App\Models\Employer\Employer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


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
    | Relations
    |--------------------------------------------------------------------------
    */
    public function advertisements(): BelongsToMany
    {
        return $this->belongsToMany(Advertisement::class, 'advertisement_candidate')
                    ->using(AdvertisementCandidate::class)
                    ->withTimestamps();
    }

    public function employers(): BelongsToMany
    {
       return $this->belongsToMany(Employer::class, 'candidate_employer')
             ->using(CandidateEmployer::class)
             ->withTimestamps();
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
