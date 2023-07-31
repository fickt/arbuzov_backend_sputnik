<?php

namespace App\Policies;

use App\Models\ResortRating;
use App\Models\User;
use Orion\Concerns\HandlesAuthorization;

class ResortRatingPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User        $user,
        ResortRating $model
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
        User         $user,
        ResortRating $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function delete(
        User         $user,
        ResortRating $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function restore(
        User         $user,
        ResortRating $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function forceDelete(
        User         $user,
        ResortRating $model
    ): bool
    {
        return $this->authorized()->allowed();
    }
}
