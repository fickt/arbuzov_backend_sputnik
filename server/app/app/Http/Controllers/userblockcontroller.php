<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserBlockRequest;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;

class UserBlockController extends Controller
{
    protected $request = UserBlockRequest::class;
}
