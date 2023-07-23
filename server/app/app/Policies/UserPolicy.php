<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\User;
use App\Policies\Traits\ChecksUserAuthority;
use Auth;
use Orion\Concerns\HandlesAuthorization;
use Request;
use Symfony\Component\HttpFoundation\Response;


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
        if($this->isAdminOrSameUser()) {
            return $this->authorized()->allowed();
        }
        return $this->authorized()->denied();
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
        if($this->isAdminOrSameUser()) {
            return $this->authorized()->allowed();
        }
        return $this->authorized()->denied();
    }

    public function delete(
        User $user,
        User $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function restore(
        User $user,
        User $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function forceDelete(
        User $user,
        User $model
    ): bool
    {
        return $this->authorized()->denied();
    }
}

