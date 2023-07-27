<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;

class ResortRecommendationController extends Controller
{
    protected $model = ResortRecommendationController::class;
    protected $policy = ResortRecommendationPolicy::class;
}
