<?php

namespace App\Policies;

use App\Models\Notification;
use App\Models\ResortPhoto;
use App\Models\User;
use App\Policies\Traits\ChecksUserAuthority;
use Orion\Concerns\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization, ChecksUserAuthority;

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
        return $user->isAdmin() || $model->user_id == \Auth::id()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
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
