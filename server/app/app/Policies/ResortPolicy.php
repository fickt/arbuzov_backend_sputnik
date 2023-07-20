<?php

namespace App\Policies;

use App\Models\Resort;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Orion\Concerns\HandlesAuthorization;

class ResortPolicy
{
    use HandlesAuthorization;

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
        return $this->authorized()->denied();
    }

    public function update(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function delete(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function restore(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function forceDelete(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->authorized()->denied();
    }
}
