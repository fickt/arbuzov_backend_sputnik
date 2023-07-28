<?php

namespace App\Http\Controllers\Resort;

use App\Http\Requests\Resort\ResortRatingRequest;
use App\Models\ResortRating;
use App\Policies\ResortRatingPolicy;
use Orion\Http\Controllers\Controller;

class ResortRatingController extends Controller //добавить resource, чтобы выводилась инфа красиво
{
    protected $model = ResortRating::class;
    protected $request = ResortRatingRequest::class;
    protected $policy = ResortRatingPolicy::class;
}
