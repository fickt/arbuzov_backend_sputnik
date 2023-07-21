<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishlistRequest;
use App\Models\WishlistElement;
use App\Policies\WishlistPolicy;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class UserWishlistController extends Controller
{
    protected $request = WishlistRequest::class;
    protected $model = WishlistElement::class;
    protected $policy = WishlistPolicy::class;
    //protected $resource = WishlistResource::class;


    /**
     * User достает только Resorts, которые у него есть в wishlist
     *
     * @param Request $request
     * @param array $requestedRelations
     * @return Builder
     */
     function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
       // return Auth::user()->resortWishlist()->get(); TODO хотелось бы здесь просто вот так сделать и дело с концами... 

        $query = parent::buildIndexFetchQuery($request, $requestedRelations);
        $query->where('user_id', '=', Auth::id());
        return $query;
    }

    /**
     * Cохраняем WishListElement для Wishlist, в котором указаны user_id, resort_id, visit_date,
     *
     * @param Request $request
     * @param Model $entity
     * @param array $attributes
     * @return void
     */
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
