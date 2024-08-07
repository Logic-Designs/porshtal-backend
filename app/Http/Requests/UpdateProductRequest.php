<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this if you have authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The product name must be a string.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
        ];
    }
}
