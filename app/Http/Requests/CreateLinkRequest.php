<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLinkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'original_link' => ['required', 'string', 'min:3', 'max:2000'],
            'expiration_date' => ['nullable', 'date'],
        ];
    }
}
