<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    public $table = 'countries';

    public $fillable = [
        'name'
    ];

    public function resorts(): HasMany
    {
        return $this->hasMany(Resort::class);
    }
}
