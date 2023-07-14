<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;

class SendUserCreatedNotification
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
        User::whereHas('role', function ($role) {
            $role->where('name', '=', 'admin');
        })->each(function ($admin) use ($event) {
            Notification::create([
                'title' => 'New user has registered!',
                'content' => 'New user with email: ' . $event->user->email . ' has registered!',
                'sent_at' => Carbon::now()->toDateTimeString()])
                ->user()
                ->associate($admin)
                ->save();

            // $notification->user()->associate($admin)->save();
        });
    }
}
