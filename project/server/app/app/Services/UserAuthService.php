<?php

namespace app\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserAuthService implements UserAuthServiceInterface
{
    public function registerUser(RegistrationRequest $request): ResponseFactory
    {
        $user = User::create(
            array_merge(
                $request->validated(),
                ['password' => bcrypt($request->password)]
            )
        );

        return response(new UserResource($user), ResponseAlias::HTTP_CREATED);
    }

    public function loginUser(LoginRequest $request): JsonResponse
    {
        if (!$token = auth()->attempt($request->validated())) {
            throw new Exception('Unauthorized');//UnauthorizedException('Unauthorized');
        }
        return $this->createJwtToken($token);
    }

    private function createJwtToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user(),
        ]);
    }
}
