<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'publication_year' => 'required|numeric',
            'status' => 'required|in:Free,Busy',
            'authors' => 'required|array',
        ];
    }
}
