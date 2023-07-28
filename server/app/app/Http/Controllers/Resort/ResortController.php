<?php

namespace App\Http\Controllers\Resort;

use App\Http\Requests\Resort\ResortRequest;
use App\Http\Resources\Resort\ResortResource;
use App\Models\Resort;
use App\Policies\ResortPolicy;
use Orion\Http\Controllers\Controller;

class ResortController extends Controller
{
    protected $model = Resort::class;
    protected $policy = ResortPolicy::class;
    protected $request = ResortRequest::class;
    protected $resource = ResortResource::class;

    public function alwaysIncludes(): array
    {
        return ['photos', 'country', 'categories'];
    }
}
