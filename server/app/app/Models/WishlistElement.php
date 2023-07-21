<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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
        self::creating(fn(self $model) => $model->performCreatingChecks());
        parent::boot();
    }

    /**
     * Чекает, добавлял ли user уже resort в wishlist, еще проверяет, есть ли ваще resort c таким id
     * @throws \Exception
     */
    private function performCreatingChecks(): void
    {
        $this->checkIfResortExists();
        $this->checkIfResortInWishlistAlreadyExists();
    }

    private function checkIfResortInWishlistAlreadyExists(): void
    {
        $resort = Auth::user()
            ->resortWishlist()
            ->where('resort_id', '=', \Request::get('resort_id'))->first();
        if ($resort) {
            throw new \Exception('User has a resort with id:' . \Request::get('resort_id') . ' in wishlist already!',
                ResponseAlias::HTTP_BAD_REQUEST
            );
        }
    }

    private function checkIfResortExists(): void
    {
        $resortId = \Request::get('resort_id');
        if (!Resort::query()->find($resortId)) {
            throw new \Exception('Resort with id: ' . $resortId . ' has not been found!', ResponseAlias::HTTP_NOT_FOUND);
        }
    }

}
