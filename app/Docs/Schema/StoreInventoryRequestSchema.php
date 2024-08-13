<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="StoreInventoryRequest",
 *     type="object",
 *     title="StoreInventoryRequest",
 *     @OA\Property(property="product_id", type="string", description=""),
 *     @OA\Property(property="warehouse_id", type="string", description=""),
 *     @OA\Property(property="quantity", type="integer", description=""),
 *     @OA\Property(property="serial_number", type="string", description=""),
 *     @OA\Property(property="location_id", type="string", description="")
 * )
 */
class StoreInventoryRequestSchema
{
}