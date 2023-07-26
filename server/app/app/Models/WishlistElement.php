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
        self::creating(fn(self $model) => $model->performCreatingActions());
        parent::boot();
    }

    private function performCreatingActions(): void
    {
        $this->checkIfResortInWishlistAlreadyExists();
        $this->putUserId();
    }

    /**
     * Чекает, добавлял ли user уже resort в wishlist
     * @throws Exception
     */
    private function checkIfResortInWishlistAlreadyExists(): void
    {
        $resort = Auth::user()
            ->resortWishlist()
            ->get();
           // ->where('resort_id', '=', $this->resort_id)
         //   ->exists();

        if ($resort) {
            throw new Exception('User has a resort with id:' . $this->resort_id . ' in wishlist already!',
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Заполняет поле user_id айдишником авторизованного пользователя
     *
     * @return void
     */
    private function putUserId(): void
    {
        $this->user_id = Auth::id();
    }
}
