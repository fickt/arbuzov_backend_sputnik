<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResortResource;
use App\Models\Resort;
use App\Policies\ResortPolicy;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class ResortController extends Controller
{
    //use DisableAuthorization;

    protected $model = Resort::class;
    protected $policy = ResortPolicy::class;
   // protected $request = UserRequest::class;
    protected $resource = ResortResource::class;

}
