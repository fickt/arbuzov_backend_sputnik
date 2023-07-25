<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResortRatingRequest;
use App\Models\ResortRating;
use Orion\Http\Controllers\Controller;

class ResortRatingController extends Controller
{
    protected $model = ResortRating::class;
    protected $request = ResortRatingRequest::class;
}
