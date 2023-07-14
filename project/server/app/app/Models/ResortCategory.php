<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class ResortCategory extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return FlightFactory::new();
    }
}
