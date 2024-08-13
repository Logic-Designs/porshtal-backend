<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="StoreInventoryLocationRequest",
 *     type="object",
 *     title="StoreInventoryLocationRequest",
 *     @OA\Property(property="warehouse_id", type="string", description="Reference to another model"),
 *     @OA\Property(property="location_code", type="string", description=""),
 *     @OA\Property(property="description", type="string", description="")
 * )
 */
class StoreInventoryLocationRequestSchema
{
}