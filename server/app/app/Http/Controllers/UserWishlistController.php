<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishlistRequest;
use App\Models\WishlistElement;
use App\Policies\WishlistPolicy;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;

class UserWishlistController extends Controller
{
    protected $request = WishlistRequest::class;
    protected $model = WishlistElement::class;
    protected $policy = WishlistPolicy::class;
}
