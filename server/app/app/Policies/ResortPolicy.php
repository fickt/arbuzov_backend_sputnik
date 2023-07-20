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
    ): Response
    {
        return $this->authorized();
    }

    public function view(
        ?User  $user,
        Resort $model
    ): Response
    {
        return $this->authorized();
    }

    public function create(
        ?User $user
    ): Response
    {
        return $this->authorized();
    }

    public function update(
        ?User  $user,
        Resort $model
    ): Response
    {
        return $this->authorized();
    }

    public function delete(
        ?User  $user,
        Resort $model
    ): Response
    {
        return $this->authorized();
    }

    public function restore(
        ?User  $user,
        Resort $model
    ): Response
    {
        return $this->authorized();
    }

    public function forceDelete(
        ?User  $user,
        Resort $model
    ): Response
    {
        return $this->authorized();
    }
}
