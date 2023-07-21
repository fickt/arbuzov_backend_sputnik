<?php

namespace App\Policies;

use App\Models\User;
use Auth;
use Orion\Concerns\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): bool {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User $user,
        User $model
    ): bool {
        return $this->authorized()->allowed();
    }

    public function create(
        ?User $user
    ): bool {
        return $this->authorized()->allowed();
    }

    public function update(
        ?User $user,
        User $model
    ): bool {
        return $this->authorized()->allowed();
    }

    public function delete(
        User $user,
        User $model
    ): bool {
        return $this->authorized()->denied();
    }

    public function restore(
        ?User $user,
        User $model
    ): bool {
        return $this->authorized()->denied();
    }

    public function forceDelete(
        ?User $user,
        User $model
    ): bool {
        return $this->authorized()->denied();
    }

}

