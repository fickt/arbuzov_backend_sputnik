<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResortPhotoRequest;
use App\Models\ResortPhoto;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;

class ResortPhotoController extends Controller
{
    protected $model = ResortPhoto::class;
    protected $request = ResortPhotoRequest::class;
}
