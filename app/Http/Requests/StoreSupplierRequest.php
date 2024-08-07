<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if you have specific authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone_number' => 'nullable|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The supplier name is required.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email format.',
            'email.unique' => 'The email address must be unique.',
        ];
    }
}
