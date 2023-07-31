<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WishlistElement;
use App\Policies\Traits\ChecksUserAuthority;
use Orion\Concerns\HandlesAuthorization;

class WishlistPolicy
{
    use HandlesAuthorization, ChecksUserAuthority;

    public function viewAny(
        User $user
    ): bool
    {

        return $this->authorized()->allowed();
    }

    public function view(
        User            $user,
        WishlistElement $model
    ): bool
    {
        return $user->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function create(
        User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function update(
        User            $user,
        WishlistElement $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function delete(
        User            $user,
        WishlistElement $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function restore(
        User            $user,
        WishlistElement $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function forceDelete(
        User            $user,
        WishlistElement $model
    ): bool
    {
        return $this->authorized()->denied();
    }
}
