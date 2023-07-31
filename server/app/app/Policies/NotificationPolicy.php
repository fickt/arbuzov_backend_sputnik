<?php

namespace App\Policies;

use App\Models\Notification;
use App\Models\User;
use Orion\Concerns\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        User         $user,
        Notification $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function create(
        User $user
    ): bool
    {
        return $user->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function update(
        User         $user,
        Notification $model
    ): bool
    {
        return $user->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function delete(
        User         $user,
        Notification $model
    ): bool
    {
        return $user->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function restore(
        User         $user,
        Notification $model
    ): bool
    {
        return $user->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function forceDelete(
        User         $user,
        Notification $model
    ): bool
    {
        return $user->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }
}
