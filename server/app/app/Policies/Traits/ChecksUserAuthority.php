<?php

namespace App\Policies\Traits;

use App\Enums\RolesEnum;

use Illuminate\Support\Facades\Auth;
use Request;

trait ChecksUserAuthority
{
    protected function isAdmin(): bool
    {
        return Auth::user()->role()->first()->name === RolesEnum::ADMIN->value;
    }
}
