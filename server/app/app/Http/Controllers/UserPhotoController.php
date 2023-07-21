<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPhotoRequest;
use App\Models\User;
use Orion\Http\Controllers\RelationController;

class UserPhotoController extends RelationController

{
    protected $model = User::class;
    protected $request = UserPhotoRequest::class;
    protected $relation = 'photos';
}
