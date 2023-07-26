<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class ResortPhotoRequest extends Request
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
            'photo' =>'required|string|min:1|max:255'
        ];
    }
}
