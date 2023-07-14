<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    private const ROLE_USER_ID = 1;

    /**
     * Регистрация и создание пользователя с ролью user
     * @param RegistrationRequest $request - email, password и confirmed_password
     * @return UserResource - зарегистрированный пользователь
     */
    public function create(RegistrationRequest $request): UserResource
    {
        $user = User::create(
            array_merge(
                $request->validated(),
                ['password' => bcrypt($request->password)]
            )
        );
        $userRole = Role::find(self::ROLE_USER_ID);
        $userRole->users()->save($user);
        return new UserResource($user);
    }

    /**
     * Авторизация пользователя
     * @param LoginRequest $request - email, password
     * @throws Exception
     * @return JsonResponse - JWT-token
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (!$token = auth()->attempt($request->validated())) {
            throw new Exception('Unauthorized');//UnauthorizedException('Unauthorized');
        }

        return $this->createJwtToken($token);
    }

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
