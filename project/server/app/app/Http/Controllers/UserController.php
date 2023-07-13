<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\ResponseFactory;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    private const ROLE_USER_ID = 1;

    /**
     * Регистрация и создание пользователя с ролью user
     * @param RegistrationRequest $request - email, password и confirmed_password
     * @return ResponseFactory - зарегистрированный пользователь
     */
    public function create(RegistrationRequest $request): ResponseFactory
    {
        $user = User::create(
            array_merge(
                $request->validated(),
                ['password' => bcrypt($request->password)]
            )
        );
        $userRole = Role::find(self::ROLE_USER_ID);
        $userRole->users()->save($user);
        return response(new UserResource($user), ResponseAlias::HTTP_CREATED);
    }

    /**
     * Авторизация пользователя
     * @param LoginRequest $request - email, password
     * @return JsonResponse - JWT-token
     */
    public function login(LoginRequest $request): JsonResponse {
        if (!$token = auth()->attempt($request->validated())) {
            throw new Exception('Unauthorized');//UnauthorizedException('Unauthorized');
        }
        return $this->createJwtToken($token);
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
            'user' => auth()->user(),
        ]);
    }
}
