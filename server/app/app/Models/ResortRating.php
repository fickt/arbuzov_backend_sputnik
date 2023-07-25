<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class ResortRating extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'user_resort_rating';
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
        //  self::created(fn(self $model) => $model->sendUserCreatedNotificationsToAdmins());
        parent::boot();
    }

    private function performCreatingActions()
    {
     //   $this->checkResortExists();
      //  $this->checkIfUserAlreadyHasRating();
    }

/*    private function checkResortExists(): void
    {
        $resort = Resort::query()->find($this->resort_id)->exists;
        if (!$resort) {
            throw new Exception('Resort with id: ' + $this->resort_id + 'has not been found!',
                Response::HTTP_NOT_FOUND);
        }
    }

    private function checkIfUserAlreadyHasRating()
    {

    }*/
}
