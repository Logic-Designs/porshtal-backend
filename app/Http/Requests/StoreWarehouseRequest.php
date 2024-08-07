<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouseRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if you have specific authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'manager_id' => 'required|exists:users,id', // Ensure the manager exists in the users table
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The warehouse name is required.',
            'location.required' => 'The location is required.',
            'manager_id.required' => 'The manager ID is required.',
            'manager_id.exists' => 'The manager ID must exist in the users table.',
        ];
    }
}
