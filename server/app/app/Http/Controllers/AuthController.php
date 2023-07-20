<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\loginResource;
use App\Http\Resources\LogoutResource;
use App\Http\Resources\UserAuthResource;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{

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
