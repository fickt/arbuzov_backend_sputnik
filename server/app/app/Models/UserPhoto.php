<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPhoto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'user_photos';

    protected $fillable = [
        'photo',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot(): void
    {
        self::creating(fn(self $model) => $model->assignCurrentUserIdToPhoto());
        parent::boot();
    }

    private function assignCurrentUserIdToPhoto(): void
    {
        $this->user_id = Auth::id();
    }
}
