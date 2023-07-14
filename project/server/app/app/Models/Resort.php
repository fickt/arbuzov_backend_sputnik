<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    protected static function newFactory(): Factory
    {
        return FlightFactory::new();
    }
}
