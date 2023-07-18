<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class RegistrationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function storeRules(): array
    {
        return [
            'email' => 'required|string|email|min:1|max:255|unique:users',
            'password' => 'required|confirmed|string|min:1|max:255|'
        ];
    }
}
