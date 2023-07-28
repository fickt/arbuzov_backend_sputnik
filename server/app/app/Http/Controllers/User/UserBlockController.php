<?php

namespace app\Http\Controllers\User;

use App\Http\Requests\User\UserBlockRequest;
use App\Models\User;
use App\Policies\UserBlockPolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class UserBlockController extends Controller
{
    protected $request = UserBlockRequest::class;
    protected $model = User::class;
    protected $policy = UserBlockPolicy::class;

    protected function runStoreFetchQuery(Request $request, Builder $query, $key): Model
    {
        return $query->first();
    }

    protected function performStore(Request $request, Model $entity, array $attributes): void
    {
        $user = User::query()->where('id','=', $request->get('user_id'))->first();
        $user->block();
        $user->save();
    }
}
