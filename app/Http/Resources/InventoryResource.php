<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'product_name' => $this->product->name ?? null, // Include product name
            'warehouse_id' => $this->warehouse_id,
            'warehouse_name' => $this->warehouse->name ?? null, // Include warehouse name
            'quantity' => $this->quantity,
            'serial_number' => $this->serial_number,
            'location_id' => $this->location_id,
            'location_code' => $this->location->location_code ?? null, // Include location code
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
