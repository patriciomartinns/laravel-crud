<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:2', 'string'],
            'content' => ['required', 'min:2', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
