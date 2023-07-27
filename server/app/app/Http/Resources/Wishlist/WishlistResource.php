<?php

namespace App\Http\Resources\Wishlist;

use App\Http\Resources\Resort\ResortResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
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
