<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if you have specific authorization logic
    }

    public function rules()
    {
        return [
            'warehouse_id' => 'nullable|exists:warehouses,id', // Ensure the warehouse exists
            'location_code' => 'nullable|string|max:255|unique:inventory_locations,location_code,' . $this->inventory_location->id,
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'warehouse_id.exists' => 'The warehouse ID must exist in the warehouses table.',
            'location_code.unique' => 'The location code must be unique.',
        ];
    }
}
