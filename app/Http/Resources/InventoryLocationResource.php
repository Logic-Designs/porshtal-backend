<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryLocationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'warehouse_id' => $this->warehouse_id,
            'location_code' => $this->location_code,
            'description' => $this->description,
            'warehouse' => new WarehouseResource($this->whenLoaded('warehouse')),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
