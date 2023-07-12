<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\UserResource;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    public function create(RegistrationRequest $request) {
        $user = User::create(
            array_merge(
                $request->validated(),
                ['password' => bcrypt($request->password)]
            )
        );
        return response(new UserResource($user), ResponseAlias::HTTP_CREATED);
    }
}
