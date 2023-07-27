<?php

namespace App\Http\Requests\User;

use Orion\Http\Requests\Request;

class UserBlockRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function storeRules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id'
        ];
    }
}
