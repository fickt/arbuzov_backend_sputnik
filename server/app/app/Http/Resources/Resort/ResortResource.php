<?php

namespace App\Http\Resources\Resort;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResortResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'rating' => $this->rating,
            'country' => $this->whenLoaded('country'),
            'categories' => $this->whenLoaded('categories'),
            'photos' => $this->whenLoaded('photos')
        ];
    }
}
