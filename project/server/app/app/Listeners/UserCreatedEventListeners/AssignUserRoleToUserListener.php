<?php

namespace app\Listeners\UserCreatedEventListeners;

use App\Enums\Roles;
use App\Events\UserCreatingEvent;
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
    public function handle(UserCreatingEvent $event): void
    {
        /**
         * @var Role $userRole
         */
        $userRole = Role::query()
            ->where('name', '=', Roles::USER)
            ->first();
        $event->getUser()->role()->associate($userRole);
    }
}
