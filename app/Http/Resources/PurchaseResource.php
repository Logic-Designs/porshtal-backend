<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'purchase_order_number' => $this->purchase_order_number,
            'supplier' => new SupplierResource($this->whenLoaded('supplier')),
            'order_date' => $this->order_date,
            'expected_delivery_date' => $this->expected_delivery_date,
            'total_amount' => $this->total_amount,
            'status' => $this->status,
            'items' => PurchaseItemResource::collection($this->whenLoaded('items')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
