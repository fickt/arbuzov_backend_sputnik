<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\ResortFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Builder
 */
class Resort extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude'
    ];

    protected $guarded = [
        'rating'
    ];

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            ResortCategory::class,
            'resort_category',
            'resort_id',
            'category_id'
        );
    }

    /**
     * Получить Users которые добавили данный Resort в Wishlist
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_resort_wishlist',
            'resort_id',
            'user_id'
        );
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ResortPhoto::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(ResortRating::class, 'resort_id', 'id');
    }

    public static function boot(): void
    {
        self::deleting(fn(self $model) => $model->sendNotificationToUserResortIsDeleted());
        parent::boot();
    }

    /**
     *  Отправляет Notifications всем Users у которых данный Resort был в Wishlist
     *
     * @return void
     */
    private function sendNotificationToUserResortIsDeleted(): void
    {
        $users = $this->users()->distinct()->get();

        foreach ($users as $user) {
            Notification::query()->create([
                'title' => 'Resort has been deleted!',
                'content' => 'Resort "' . $this->name . '" has been deleted so it is no longer in your wishlist!',
                'user_id' => $user->id,
                'sent_at' => Carbon::now()
            ]);
        }


    }

    protected static function newFactory(): ResortFactory
    {
        return ResortFactory::new();
    }
}
