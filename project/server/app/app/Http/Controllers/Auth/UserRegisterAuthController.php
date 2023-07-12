<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegistrationRequest;

class UserRegisterAuthController extends BaseAuthController
{
    public function __invoke(RegistrationRequest $request)
    {
        return $this->service->registerUser($request);
    }
}
