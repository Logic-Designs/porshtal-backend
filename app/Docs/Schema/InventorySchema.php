<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Inventory",
 *     type="object",
 *     title="Inventory",
 *     @OA\Property(property="id", type="string", description=""),
 *     @OA\Property(property="product_id", type="string", description="Reference to the Product model"),
 *     @OA\Property(property="warehouse_id", type="string", description=""),
 *     @OA\Property(property="quantity", type="string", description=""),
 *     @OA\Property(property="serial_number", type="string", description=""),
 *     @OA\Property(property="location_id", type="string", description="")
 * )
 */
class InventorySchema
{
}