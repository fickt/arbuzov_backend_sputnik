<?php

namespace app\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;

interface UserAuthServiceInterface
{
    public function registerUser(RegistrationRequest $request);
    public function loginUser(LoginRequest $request);
}
