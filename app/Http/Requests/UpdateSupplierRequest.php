<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if you have specific authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:suppliers,email,' . $this->supplier->id,
            'phone_number' => 'nullable|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The supplier name must be a string.',
            'email.email' => 'The email address must be a valid email format.',
            'email.unique' => 'The email address must be unique.',
        ];
    }
}
