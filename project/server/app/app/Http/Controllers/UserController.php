<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\LogoutResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{

    /**
     * Регистрация и создание пользователя с ролью user
     *
     * @param RegistrationRequest $request - email, password и confirmed_password
     * @return UserResource - зарегистрированный пользователь
     */
    public function create(RegistrationRequest $request): UserResource
    {
        $user = User::query()->create((
        $request->validated()
        ));

        return new UserResource($user);
    }

    /**
     * Авторизация пользователя
     *
     * @param LoginRequest $request - email, password
     * @return JsonResponse - JWT-token
     * @throws Exception
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (!$token = auth()->attempt($request->validated())) {
            throw new Exception('Unauthorized', ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return $this->createJwtToken($token);
    }

    /**
     * Разлогировать текущего user
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
     * @return JsonResponse - JWT-token
     */
    private function createJwtToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
