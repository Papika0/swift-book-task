<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'publication_year' => 'required',
            'status' => 'required|in:Free,Busy',
            'authors' => 'required|array',
        ];
    }
}
