<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class UserPhotoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function storeRules(): array
    {
        return [
            'photo' => 'required|string|min:1|max:255'
        ];
    }
}
