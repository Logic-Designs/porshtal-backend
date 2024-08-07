<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarehouseRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if you have specific authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'manager_id' => 'nullable|exists:users,id', // Ensure the manager exists in the users table
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The warehouse name must be a string.',
            'location.string' => 'The location must be a string.',
            'manager_id.exists' => 'The manager ID must exist in the users table.',
        ];
    }
}
