<?php

namespace app\Http\Controllers\Notification;

use App\Models\Notification;
use App\Policies\NotificationPolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class NotificationController extends Controller //добавить ресурс и реквест(допустим если администратор захочет создать уведомление),
{                                               //но не факт, это мое видение
    protected $model = Notification::class;
    protected $policy = NotificationPolicy::class;

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildFetchQuery($request, $requestedRelations); // я бы выбрал родителем buildIndexFetchQuery
        $query->where('user_id', '=', Auth::id()); //  '=' можно опустить, оно стоит по дефолту
        return $query;
    }
}
