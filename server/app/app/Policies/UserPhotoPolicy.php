<?php

namespace App\Policies;

use App\Models\Resort;
use App\Models\User;
use App\Models\UserPhoto;
use Orion\Concerns\HandlesAuthorization;

class UserPhotoPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User     $user,
        UserPhoto $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function create(
        User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function update(
        User      $user,
        UserPhoto $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function delete(
        User      $user,
        UserPhoto $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function restore(
        User      $user,
        UserPhoto $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function forceDelete(
        User      $user,
        UserPhoto $model
    ): bool
    {
        return $this->authorized()->allowed();
    }
}
