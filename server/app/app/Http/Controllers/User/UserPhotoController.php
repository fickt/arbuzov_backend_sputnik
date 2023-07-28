<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserPhotoRequest;
use App\Http\Resources\User\UserPhotoResource;
use App\Models\UserPhoto;
use App\Policies\UserPhotoPolicy;
use Orion\Http\Controllers\Controller;

class UserPhotoController extends Controller

{
    protected $model = UserPhoto::class;
    protected $request = UserPhotoRequest::class;
    protected $policy = UserPhotoPolicy::class;
    protected $resource = UserPhotoResource::class;

}
