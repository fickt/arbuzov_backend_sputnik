<?php

namespace App\Policies;

use App\Models\ResortRecommendation;
use App\Models\User;
use Orion\Concerns\HandlesAuthorization;

class ResortRecommendationPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User                $user,
        ResortRecommendation $model
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
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function delete(
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function restore(
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function forceDelete(
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $this->authorized()->allowed();
    }
}
