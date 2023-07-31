<?php

namespace App\Policies;

use App\Models\User;
use App\Policies\Traits\ChecksUserAuthority;
use Orion\Concerns\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization, ChecksUserAuthority;

    public function viewAny(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User $user,
        User  $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function create(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function update(
        User $user,
        User $model
    ): bool
    {
        return $this->isAdmin() || $model->user_id == \Auth::id()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function delete(
        User $user,
        User $model
    ): bool
    {
        return $this->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function restore(
        User $user,
        User $model
    ): bool
    {
        return $this->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function forceDelete(
        User $user,
        User $model
    ): bool
    {
        return $this->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }
}

