<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RolesEnum;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @mixin Builder
 */
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $guarded = [
        'is_blocked',
        'role_id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'nickname',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the role associated with the user.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(UserPhoto::class);
    }

    public function resortWishlist(): BelongsToMany
    {
        return $this->belongsToMany(Resort::class,
            'user_resort_wishlist',
            'user_id',
            'resort_id'
        );
    }

    public static function boot(): void
    {
        self::creating(fn(self $model) => $model->assignUserRoleToUser());
        self::created(fn(self $model) => $model->sendUserCreatedNotificationsToAdmins());

        self::updating(fn(self $model) => $model->isAuthorized());
        parent::boot();
    }
    
    /**
     * Получить все уведомления user
     *
     * @return HasMany
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    private function sendUserCreatedNotificationsToAdmins(): void
    {
        $admins = User::query()->whereHas('role', function ($role) {
            $role->where('name', '=', RolesEnum::ADMIN);
        })->get();

        foreach ($admins as $admin) {
            Notification::query()->create([
                'title' => 'New user has registered!',
                'content' => 'New user with email: ' . $this->getEmailForVerification() . ' has registered!',
                'user_id' => $admin->id,
                'sent_at' => Carbon::now()
            ]);
        }
    }

    private function assignUserRoleToUser(): void
    {
        $userRole = Role::query()
            ->where('name', '=', RolesEnum::USER)
            ->first();
        $this->role()->associate($userRole);
    }

    /**
     * User изменяет только свои данные, либо если role = admin, то пусть меняет кого угодно
     *
     * @throws \Exception
     */
    private function isAuthorized(): void
    {
        $currentUserId = \Request::route('user');

        if (!(Auth::id() == $currentUserId || Auth::user()->role()->first()->name == RolesEnum::ADMIN)) {
            throw new \Exception("Unauthorized", Response::HTTP_UNAUTHORIZED);
        }
    }
}
