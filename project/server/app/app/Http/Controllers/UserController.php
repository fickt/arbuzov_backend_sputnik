<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\ResponseFactory;
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
}
