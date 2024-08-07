<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if you have specific authorization logic
    }

    public function rules()
    {
        return [
            'warehouse_id' => 'required|exists:warehouses,id', // Ensure the warehouse exists
            'location_code' => 'required|string|max:255|unique:inventory_locations,location_code',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'warehouse_id.required' => 'The warehouse ID is required.',
            'warehouse_id.exists' => 'The warehouse ID must exist in the warehouses table.',
            'location_code.required' => 'The location code is required.',
            'location_code.unique' => 'The location code must be unique.',
        ];
    }
}
