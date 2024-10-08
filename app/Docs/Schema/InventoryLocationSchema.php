<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="InventoryLocation",
 *     type="object",
 *     title="InventoryLocation",
 *     @OA\Property(property="id", type="string", description=""),
 *     @OA\Property(property="warehouse_id", type="string", description=""),
 *     @OA\Property(property="location_code", type="string", description=""),
 *     @OA\Property(property="description", type="string", description="")
 * )
 */
class InventoryLocationSchema
{
}