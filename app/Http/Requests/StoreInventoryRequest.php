<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|uuid',
            'warehouse_id' => 'required|uuid',
            'quantity' => 'required|integer',
            'serial_number' => 'nullable|string|max:100',
            'location_id' => 'nullable|uuid',
        ];
    }
}
