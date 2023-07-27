<?php

namespace app\Http\Controllers\User;

use App\Http\Requests\Wishlist\WishlistRequest;
use App\Http\Resources\Wishlist\WishlistResource;
use App\Models\WishlistElement;
use App\Policies\WishlistPolicy;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class UserWishlistController extends Controller
{
    protected $request = WishlistRequest::class;
    protected $model = WishlistElement::class;
    protected $policy = WishlistPolicy::class;
    protected $resource = WishlistResource::class;


    /**
     * User достает только Resorts, которые у него есть в wishlist
     *
     * @param Request $request
     * @param array $requestedRelations
     * @return Builder
     */
    function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);
        return $query->where('user_id', Auth::id());
    }

    public function alwaysIncludes(): array
    {
        return ['resort'];
    }
}
