<?php

namespace app\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserAuthServiceImpl
{
    public function registerUser(RegistrationRequest $request){
        $user = User::create(
            array_merge(
                $request->validated(),
                ['password' => bcrypt($request->password)]
            )
        );
        return response()->json(
            [
                'user' => new UserResource($user)
            ],
            ResponseAlias::HTTP_CREATED
        );
    }
    public function loginUser(LoginRequest $request){

    }
}
