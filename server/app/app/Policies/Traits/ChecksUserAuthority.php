<?php

namespace app\Policies\Traits;

use App\Enums\RolesEnum;
use Auth;
use Request;

trait ChecksUserAuthority
{
    private function isAdminOrSameUser(): bool
    {
        $currentUserId = Request::route('user');

        if (Auth::id() != $currentUserId || !(Auth::user()->role()->first()->name !== RolesEnum::ADMIN)) {
            return false;
        }
        return true;
    }
}
