<?php

namespace App\Http\Controllers\Notification;

use App\Models\Notification;
use App\Policies\NotificationPolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class NotificationController extends Controller
{
    protected $model = Notification::class;
    protected $policy = NotificationPolicy::class;

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);
        $query->where('user_id', '=', Auth::id());
        return $query;
    }

    protected function buildShowFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildShowFetchQuery($request, $requestedRelations);
        $query->where('user_id', '=', Auth::id());
        return $query;
    }
}
