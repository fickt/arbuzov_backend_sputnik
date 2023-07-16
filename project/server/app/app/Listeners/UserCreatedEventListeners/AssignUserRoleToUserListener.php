<?php

namespace app\Listeners\UserCreatedEventListeners;

use App\Enums\Roles;
use App\Events\UserCreatedEvent;
use App\Models\Role;

class AssignUserRoleToUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     */
    public function handle(UserCreatedEvent $event): void
    {
        $userRole = Role::query()
            ->where('name', '=', Roles::USER)
            ->first();

        $event->getUser()->role()->associate($userRole)->save();
    }
}
