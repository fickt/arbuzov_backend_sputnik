<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

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
     * @throws Exception
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
            ->where('resort_id', '=', $this->resort_id)
            ->exists();

        if ($resort) {
            throw new Exception('User has a resort with id:' . $this->resort_id . ' in wishlist already!',
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    private function checkIfResortExists(): void
    {
        if (!Resort::query()->find($this->resort_id)) {
            throw new Exception('Resort with id: ' . $this->resort_id . ' has not been found!',
                Response::HTTP_NOT_FOUND
            );
        }
    }

}
