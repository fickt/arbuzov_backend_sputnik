<?php

namespace App\Models;

use Database\Factories\ResortFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Builder
 */
class Resort extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude'
    ];

    protected $guarded = [
        'rating'
    ];

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            ResortCategory::class,
            'resort_category',
            'resort_id',
            'category_id'
        );
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(ResortRating::class, 'resort_id', 'id');
    }

    protected static function newFactory(): ResortFactory
    {
        return ResortFactory::new();
    }
}
