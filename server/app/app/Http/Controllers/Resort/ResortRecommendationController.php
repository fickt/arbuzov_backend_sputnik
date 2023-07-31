<?php

namespace App\Http\Controllers\Resort;

use App\Http\Resources\Resort\ResortRecommendationResource;
use App\Models\ResortRecommendation;
use App\Policies\ResortRecommendationPolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class ResortRecommendationController extends Controller
{
    protected $model = ResortRecommendation::class;
    protected $policy = ResortRecommendationPolicy::class;
    protected $resource = ResortRecommendationResource::class;


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

    public function alwaysIncludes(): array
    {
        return ['resort'];
    }
}
