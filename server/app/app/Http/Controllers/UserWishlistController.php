<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishlistRequest;
use App\Models\WishlistElement;
use App\Policies\WishlistPolicy;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class UserWishlistController extends Controller
{
    protected $request = WishlistRequest::class;
    protected $model = WishlistElement::class;
    protected $policy = WishlistPolicy::class;

    protected function performStore(Request $request, Model $entity, array $attributes): void
    {
        var_dump(Auth::id());
        $entity->fill(array_merge(
                $attributes,
                ['user_id' => Auth::id()]
            )
        );
        $entity->save();
    }

    protected function keyName(): string
    {
        return 'id';
    }
}
