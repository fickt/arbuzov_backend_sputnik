<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

/**
 * @mixin Builder
 */
class WishlistElement extends Model
{
    use HasFactory;

    protected $table = 'user_resort_wishlist';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'resort_id',
        'visit_date'
    ];

    public static function boot(): void
    {
        self::creating(fn(self $model) => $model->checkIfResortExists());
        parent::boot();
    }

    private function checkIfResortExists(): void
    {
        $resortId = \Request::get('resort_id');
        if (!Resort::query()->find($resortId)) {
            throw new Exception('Resort with id: ' . $resortId . ' has not been found!');
        }
    }

}
