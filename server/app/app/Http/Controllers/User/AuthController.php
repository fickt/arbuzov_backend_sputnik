<?php

namespace app\Http\Controllers\User;

use App\Http\Requests\RegistrationRequest; //неиспользуемые импорты, надо бы убирать
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\User\LoginResource;
use App\Http\Resources\User\LogoutResource;
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
            // в Exception handlere код вытаскивается методом getStatusCode, которого в этом exception нет
            // и в случае ошибки вернется 500 а не 401, можно создать собственное исключение с этим методом
            // или найти готовое, например HttpException.
        }

        return new LoginResource($token);
    }

    /**
     * Разлогинить текущего user
     *
     * @return LogoutResource
     */
    public function logout(): LogoutResource
    {
        auth()->logout();
        return new LogoutResource('');
    }
}