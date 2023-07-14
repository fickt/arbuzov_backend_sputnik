<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Notification extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "user_resort_notifications";

    protected $fillable = [
        'title',
        'content',
        'sent_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
