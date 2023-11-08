<?php

namespace App\Models\Employer;

use App\Models\AdvertisementCandidate;
use App\Models\Candidate\Candidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    protected $casts = [
        'employer_id' => 'integer',
        'category_id' => 'integer'
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

      public function candidates(): BelongsToMany
      {
          return $this->belongsToMany(Candidate::class, 'advertisement_candidate')
                      ->using(AdvertisementCandidate::class)
                      ->withTimestamps();
      }

}
