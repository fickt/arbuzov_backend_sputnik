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
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'resort_id' => $this->resort_id,
            'visit_date' => $this->visit_date,
            'resort' => $this->whenLoaded('resort')
        ];
    }
}
