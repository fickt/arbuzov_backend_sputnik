<?php

namespace App\Policies;

use App\Models\ResortRecommendation;
use App\Models\User;
use App\Policies\Traits\ChecksUserAuthority;
use Orion\Concerns\HandlesAuthorization;

class ResortRecommendationPolicy
{
    use HandlesAuthorization, ChecksUserAuthority;

    public function viewAny(
        User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $user->isAdmin() || $model->user_id == \Auth::id()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function create(
        User $user
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function update(
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function delete(
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $user->isAdmin() || $model->user_id == \Auth::id()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function restore(
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $user->isAdmin() || $model->user_id == \Auth::id()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }

    public function forceDelete(
        User                 $user,
        ResortRecommendation $model
    ): bool
    {
        return $user->isAdmin() || $model->user_id == \Auth::id()
            ? $this->authorized()->allowed()
            : $this->authorized()->denied();
    }
}
