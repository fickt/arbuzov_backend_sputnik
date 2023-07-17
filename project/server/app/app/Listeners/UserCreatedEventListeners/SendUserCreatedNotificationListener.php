<?php

namespace app\Listeners\UserCreatedEventListeners;

use App\Enums\RolesEnum;
use App\Events\UserCreatedEvent;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;

class SendUserCreatedNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Отправляет notifications админам о зарегистрированном User
     *
     * @param UserCreatedEvent $event
     */
    public function handle(UserCreatedEvent $event): void
    {
        $admins = User::query()->whereHas('role', function ($role) {
            $role->where('name', '=', RolesEnum::ADMIN);
        })->get();

        foreach ($admins as $admin) {
            $notification = new Notification();
            $notification->fill([
                'title' => 'New user has registered!',
                'content' => 'New user with email: ' . $event->getUser()->email . ' has registered!',
                'sent_at' => Carbon::now()]);

            $notification->user()->associate($admin)->save();
        }
    }
}
