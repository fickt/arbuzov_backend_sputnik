<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function resort(): BelongsTo
    {
        return $this->belongsTo(Resort::class);
    }

    public static function boot(): void
    {
        //Вместо стрелочной функции, можно использовать просто анонимную,
        //тогда можно не использовать вспомогательные методы, вызывающие остальные методы
        //например:
        // self::created(function (self $model) {
        //     $model->checkIfResortInWishlistAlreadyExists();
        //     $model->putUserId();
        // });
        self::creating(fn(self $model) => $model->performCreatingActions());
        self::created(fn(self $model) => $model->performCreatedActions());
        parent::boot();
    }

    private function performCreatedActions(): void
    {
        $this->addRecommendationsToUser();
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
        //по-моему неудачное название для булевой переменной
        //обычно называют isЧтоНибудь, hasЧтоНибудь
        $resort = Auth::user()
            ->resortWishlist()
            ->where('resort_id', '=', $this->resort_id)
            //вроде необязательно = использовать в where()
            //можно короче where('resort_id', $this->resort_id)
            ->exists();

        if ($resort) {
            throw new Exception('User has a resort with id:' . $this->resort_id . ' in wishlist already!',
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    private function addRecommendationsToUser(): void
    {
        $resort = $this->resort()->first();

        $resorts = Resort::query()->whereHas('country', function ($q) use ($resort) {
            $q->where('id', '=', $resort->country_id);
        })->get();

        foreach ($resorts as $resort) {
            var_dump(Auth::id());//видимо забыл при дебаге :)
            ResortRecommendation::query()->create(
                [
                    'user_id' => Auth::id(),
                    'resort_id' => $resort->id
                ]
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
