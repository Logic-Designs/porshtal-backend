<?php

namespace App\Docs\Schema;;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Inventory",
 *     type="object",
 *     title="Inventory",
 *     required={"id"},
 *     @OA\Property(property="id", type="string"),
 *     @OA\Property(property="product_id", type="string"),
 *     @OA\Property(property="warehouse_id", type="string"),
 *     @OA\Property(property="quantity", type="string"),
 *     @OA\Property(property="serial_number", type="string"),
 *     @OA\Property(property="location_id", type="string")
 * )
 */
class InventorySchema
{
}