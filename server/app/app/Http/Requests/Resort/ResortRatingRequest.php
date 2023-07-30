<?php

namespace App\Http\Requests\Resort;

use Orion\Http\Requests\Request;

class ResortRatingRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function storeRules(): array
    {
        return [
            'resort_id' => 'required|integer|exists:resorts,id',
            'comment' => 'string|max:5000',
            'rating' => 'required|integer|min:1|max:5'
        ];
    }
}
