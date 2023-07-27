<?php

namespace App\Http\Controllers;

use App\Policies\ResortRecommendationPolicy;
use Orion\Http\Controllers\Controller;

class ResortRecommendationController extends Controller
{
    protected $model = ResortRecommendationController::class;
    protected $policy = ResortRecommendationPolicy::class;
}
