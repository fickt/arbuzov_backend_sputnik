<?php

namespace App\Http\Requests\Wishlist;

use Orion\Http\Requests\Request;


class WishlistRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function storeRules(): array
    {
        return [
            'resort_id' => 'required|integer|exists:resorts,id|min:1'
        ];
    }
}
