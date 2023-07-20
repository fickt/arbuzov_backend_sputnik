<?php

namespace App\Http\Controllers;

use App\Enums\RolesEnum;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Policies\UserPolicy;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    protected $model = User::class;
    protected $policy = UserPolicy::class;
    protected $request = UserRequest::class;
    protected $resource = UserResource::class;

    protected function performStore(Request $request, Model $entity, array $attributes): void
    {
        $entity->fill($attributes);
        $entity->save();
    }

    /**
     * User изменяет только свои данные, либо если role = admin, то пусть меняет кого угодно
     *
     * @param Request $request
     * @param array $requestedRelations
     * @return Builder
     * @throws \Exception
     */
    protected function buildUpdateFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $currentUserId = $request->route('user');
        if (Auth::id() == $currentUserId || Auth::user()->role()->first()->name == RolesEnum::ADMIN) {
            return parent::buildUpdateFetchQuery($request, $requestedRelations);
        } else {
            throw new \Exception("Unauthorized", Response::HTTP_UNAUTHORIZED);
        }
    }
}
