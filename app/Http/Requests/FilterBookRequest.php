<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:255'],
            'author_id' => ['nullable', 'integer', 'exists:authors,id'],
        ];
    }
}
