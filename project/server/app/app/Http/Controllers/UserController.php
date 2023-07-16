<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
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
     * @throws Exception
     * @return JsonResponse - JWT-token
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
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json([
            'message' => 'User has logged out!',
        ]);
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
