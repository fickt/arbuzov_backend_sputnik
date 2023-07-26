<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ResortPhoto extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'resort_photos';

    public $fillable = [
        'resort_id',
        'photo'
    ];

    public function resort(): BelongsTo
    {
        return $this->belongsTo(Resort::class);
    }
}
