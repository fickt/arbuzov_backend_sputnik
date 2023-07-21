<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPhotoRequest;
use App\Http\Resources\UserPhotoResource;
use App\Models\UserPhoto;
use App\Policies\UserPhotoPolicy;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class UserPhotoController extends Controller

{
    protected $model = UserPhoto::class;
    protected $request = UserPhotoRequest::class;
    protected $policy = UserPhotoPolicy::class;
    protected $resource = UserPhotoResource::class;

    protected function performStore(Request $request, Model $entity, array $attributes): void
    {
            $entity->fill(array_merge(
                    $attributes,
                    ['user_id' => Auth::id()]
                )
            );
        $entity->save();
    }
}
