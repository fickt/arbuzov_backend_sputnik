<?php

namespace App\Policies;

use App\Models\Resort;
use App\Models\User;
use App\Policies\Traits\ChecksUserAuthority;
use Orion\Concerns\HandlesAuthorization;

class ResortPolicy
{
    use HandlesAuthorization, ChecksUserAuthority;

    public function viewAny(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User  $user,
        Resort $model
    ): bool
    {
            return $this->authorized()->allowed();
    }

    public function create(
        User $user
    ): bool
    {
        return $this->isAdmin() ?
            $this->authorized()->allowed() :
            $this->authorized()->denied();
    }

    public function update(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->isAdmin() ?
            $this->authorized()->allowed() :
            $this->authorized()->denied();
    }

    public function delete(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->isAdmin() ?
            $this->authorized()->allowed() :
            $this->authorized()->denied();
    }

    public function restore(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->isAdmin() ?
            $this->authorized()->allowed() :
            $this->authorized()->denied();
    }

    public function forceDelete(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->isAdmin() ?
            $this->authorized()->allowed() :
            $this->authorized()->denied();
    }
}
