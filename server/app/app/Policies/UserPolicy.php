<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\User;
use Auth;
use Orion\Concerns\HandlesAuthorization;
use Symfony\Component\HttpFoundation\Response;


class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function view(
        ?User $user,
        User  $model
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function create(
        ?User $user
    ): bool
    {
        return $this->authorized()->allowed();
    }

    public function update(
        User $user,
        User $model
    ): bool
    {
        if($this->isAdminOrSameUser()) {
            return $this->authorized()->allowed();
        }
        return $this->authorized()->allowed();
    }

    public function delete(
        User $user,
        User $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function restore(
        User $user,
        User $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    public function forceDelete(
        User $user,
        User $model
    ): bool
    {
        return $this->authorized()->denied();
    }

    private function isAdminOrSameUser(): bool
    {
        $currentUserId = \Request::route('user');

        if (Auth::id() != $currentUserId || !(Auth::user()->role()->first()->name !== RolesEnum::ADMIN)) {
            throw new \Exception("Unauthorized", Response::HTTP_UNAUTHORIZED);
        }
        return true;
    }

}

