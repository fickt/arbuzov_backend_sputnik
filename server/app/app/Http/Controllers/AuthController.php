<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\LogoutResource;
use Exception;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{

    /**
     * Авторизация пользователя
     *
     * @param LoginRequest $request - email, password
     * @return LoginResource - JWT-token
     * @throws Exception
     */
    public function login(LoginRequest $request): LoginResource
    {
        if (!$token = auth()->attempt($request->validated())) {
            throw new Exception('Unauthorized', ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return $this->createJwtToken($token);
    }

    /**
     * Разлогинить текущего user
     *
     * @return LogoutResource
     */
    public function logout(): LogoutResource
    {
        auth()->logout();
        return new LogoutResource();
    }

    /**
     * @param $token
     * @return LoginResource - JWT-token
     */
    private function createJwtToken($token): LoginResource
    {
        return new LoginResource($token);
    }
}
