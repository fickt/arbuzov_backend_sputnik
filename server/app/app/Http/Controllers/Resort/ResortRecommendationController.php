<?php

namespace App\Http\Controllers\Resort;

use App\Http\Resources\Resort\ResortRecommendationResource;
use App\Models\ResortRecommendation;
use App\Policies\ResortRecommendationPolicy;
use Orion\Http\Controllers\Controller;

class ResortRecommendationController extends Controller
{
    protected $model = ResortRecommendation::class;
    protected $policy = ResortRecommendationPolicy::class;
    protected $resource = ResortRecommendationResource::class;

    public function alwaysIncludes(): array
    {
        return ['resort'];
    }
}
