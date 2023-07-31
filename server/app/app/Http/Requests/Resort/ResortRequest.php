<?php

namespace App\Http\Requests\Resort;

use Orion\Http\Requests\Request;

class ResortRequest extends Request
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function storeRules(): array
    {
        return [
            [
                'name' => 'required|string|unique:resorts,name|min:1|max:255',
                'description' => 'required|string|min:1|max:5000',
                'longitude' => 'required|float',
                'latitude' => 'required|float',
            ]
        ];
    }
}
