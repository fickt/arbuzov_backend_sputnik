<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class UserController extends Controller
{

    protected $model = User::class;
    protected $policy = UserPolicy::class;
    protected $request = UserRequest::class;
    protected $resource = UserResource::class;


    public function alwaysIncludes(): array
    {
        return ['photos', 'role'];
    }
}
