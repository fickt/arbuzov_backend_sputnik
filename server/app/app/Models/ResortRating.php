<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ResortRating extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'resort_user_ratings';
    protected $guarded = [
        'user_id'
    ];

    protected $fillable = [
        'resort_id',
        'comment',
        'rating'
    ];

    public static function boot(): void
    {
        self::creating(fn(self $model) => $model->performCreatingActions());
        self::created(fn(self $model) => $model->performCreatedActions());
        parent::boot();
    }

    private function performCreatedActions()
    {
        $this->recalculateResortRating();
    }

    private function performCreatingActions(): void
    {
        $this->checkIfUserAlreadyHasRatedResort();
        $this->assignCurrentUserIdToRating();
    }


    /**
     * @throws Exception
     */
    private function checkIfUserAlreadyHasRatedResort(): void
    {
        $resort = ResortRating::query()->where(
            ['resort_id', '=', $this->resort_id],
            ['user_id', '=', Auth::id()]
        )
            ->exists();

        if ($resort) {
            throw new Exception('User has already rated Resort with id: ' . $this->resort_id,
                Response::HTTP_BAD_REQUEST);
        }
    }


    /**
     * Пересчитывает Resort rating с учётом новой оценки от User
     *
     * @return void
     */
    private function recalculateResortRating()
    {
        $rating = ResortRating::query()
            ->where('resort_id', '=', $this->resort_id)
            ->avg('rating');

        $resort = Resort::query()->find($this->resort_id);

        $resort->rating = (int)$rating;
        $resort->save();
    }

    private function assignCurrentUserIdToRating(): void
    {
        $this->user_id = Auth::id();
    }
}
