<?php

namespace App\Policies;

use App\Models\ResortPhoto;
use App\Models\User;
use App\Models\UserPhoto;
use App\Policies\Traits\ChecksUserAuthority;
use Orion\Concerns\HandlesAuthorization;

class ResortPhotoPolicy
{
    use HandlesAuthorization, ChecksUserAuthority;

    public function viewAny(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User       $user,
        ResortPhoto $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function create(
        User $user
    ): bool
    {
        return $this->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function update(
        User        $user,
        ResortPhoto $model
    ): bool
    {
        return $this->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function delete(
        User        $user,
        ResortPhoto $model
    ): bool
    {
        return $this->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function restore(
        User        $user,
        ResortPhoto $model
    ): bool
    {
        return $this->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function forceDelete(
        User        $user,
        ResortPhoto $model
    ): bool
    {
        return $this->isAdmin()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }
}
