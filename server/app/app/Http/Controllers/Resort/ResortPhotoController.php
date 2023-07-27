<?php

namespace App\Http\Controllers\Resort;

use App\Http\Requests\Resort\ResortPhotoRequest;
use App\Models\ResortPhoto;
use Orion\Http\Controllers\Controller;

class ResortPhotoController extends Controller
{
    protected $model = ResortPhoto::class;
    protected $request = ResortPhotoRequest::class;
}
