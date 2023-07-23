<?php

namespace App\Policies;

use App\Models\Resort;
use App\Models\User;
use Auth;
use Illuminate\Auth\Access\Response;
use Orion\Concerns\HandlesAuthorization;
use Request;

class ResortPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function view(
        ?User  $user,
        Resort $model
    ): bool
    {
        if(Auth::id() == Request::get('user')) {
            return $this->authorized()->allowed();
        }
        return $this->authorized()->denied();
    }

    public function create(
        User $user
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function update(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function delete(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function restore(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function forceDelete(
        User  $user,
        Resort $model
    ): bool
    {
        return $this->authorized()->denied();
    }
}
