<?php

namespace App\Models;

use Database\Factories\ResortCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin Builder
 */
class ResortCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Получить все resorts которые связаны с данным ResortCategory
     *
     * @return BelongsToMany
     */
    public function resorts(): BelongsToMany
    {
        return $this->belongsToMany(
            Resort::class,
            'resort_category',
            'category_id',
            'resort_id'
        );
    }

    protected static function newFactory(): ResortCategoryFactory
    {
        return ResortCategoryFactory::new();
    }
}
