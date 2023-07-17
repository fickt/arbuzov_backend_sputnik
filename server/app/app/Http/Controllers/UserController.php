<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $model = User::class;
}
