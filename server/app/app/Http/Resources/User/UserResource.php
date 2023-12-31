<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'nickname' => $this->nickname,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'photos' => $this->whenLoaded('photos'),
            'role' => $this->whenLoaded('role')
        ];
    }
}
