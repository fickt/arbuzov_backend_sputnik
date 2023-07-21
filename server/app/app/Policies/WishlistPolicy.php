<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WishlistElement;
use Orion\Concerns\HandlesAuthorization;

class WishlistPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): bool {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User $user,
        WishlistElement $model
    ): bool {
        return $this->authorized()->allowed();
    }

    public function create(
        ?User $user
    ): bool {
        //var_dump(\Request::all('resort_id'));
        return $this->authorized()->allowed();
    }

    public function update(
        ?User $user,
        WishlistElement $model
    ): bool {
        return $this->authorized()->allowed();
    }

    public function delete(
        User $user,
        WishlistElement $model
    ): bool {
        return $this->authorized()->denied();
    }

    public function restore(
        ?User $user,
        WishlistElement $model
    ): bool {
        return $this->authorized()->denied();
    }

    public function forceDelete(
        ?User $user,
        WishlistElement $model
    ): bool {
        return $this->authorized()->denied();
    }
}