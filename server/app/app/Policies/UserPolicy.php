<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Orion\Concerns\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): Response {
        return $this->authorized();
    }

    public function view(
        ?User $user,
        User $model
    ): Response {
        return $this->authorized();
    }

    public function create(
        ?User $user
    ): Response {
        return $this->authorized();
    }

    public function update(
        ?User $user,
        User $model
    ): Response {
        return $this->authorized();
    }

    public function delete(
        ?User $user,
        User $model
    ): Response {
        return $this->authorized();
    }

    public function restore(
        ?User $user,
        User $model
    ): Response {
        return $this->authorized();
    }

    public function forceDelete(
        ?User $user,
        User $model
    ): Response {
        return $this->authorized();
    }

}

