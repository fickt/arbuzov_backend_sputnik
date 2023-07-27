<?php

namespace App\Http\Requests\User;

use Orion\Http\Requests\Request;

class UserRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function updateRules(): array
    {
        return [
            'nickname' => 'string|min:1|max:255',
            'first_name' => 'string|min:1|max:255',
            'last_name' => 'string|min:1|max:255'
        ];
    }

    public function storeRules(): array
    {
        return [
            'email' => 'required|string|email|min:1|max:255|unique:users',
            'password' => 'required|confirmed|string|min:1|max:255|',
            'nickname' => 'prohibited',
            'first_name' => 'prohibited',
            'last_name' => 'prohibited'
        ];
    }
}
