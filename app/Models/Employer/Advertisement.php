<?php

namespace App\Models\Employer;

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

    /*  public function tags(): BelongsToMany
      {
          return $this->belongsToMany(Tag::class, 'advertisement_tag')
                      ->using(AdvertisementTag::class)
                      ->withTimestamps();
      }*/

}
