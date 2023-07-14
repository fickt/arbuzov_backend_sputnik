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
     * @param UserCreatedEvent $event
     */
    public function handle(UserCreatedEvent $event): void
    {
        $admins = User::whereHas('role', function ($q) {
            $q->where('name', '=', 'admin');
        });

        foreach ($admins->get() as $admin) {
            $notification = Notification::create([
                'title' => 'New user has registered!',
                'content' => 'New user with email: ' . $event->user->email . ' has registered!',
                'sent_at' => Carbon::now()->toDateTimeString()
            ]);
            $notification->user()->associate($admin)->save();
        }
      }
}
