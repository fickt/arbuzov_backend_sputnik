<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Policies\NotificationPolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class NotificationController extends Controller // добавить ресурс, потому что в каком формате уведомления выводятся
{
    protected $model = Notification::class;
    protected $policy = NotificationPolicy::class;

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildFetchQuery($request, $requestedRelations);
        $query->where('user_id', '=', Auth::id());
        return $query;
    }
}