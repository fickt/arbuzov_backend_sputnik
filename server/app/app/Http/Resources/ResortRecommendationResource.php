<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResortRecommendationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return ResortResource
     */
    public function toArray(Request $request): ResortResource
    {
        return ResortResource::make($this->whenLoaded('resort'));
    }
}
