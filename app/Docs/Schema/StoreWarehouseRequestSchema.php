<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="StoreWarehouseRequest",
 *     type="object",
 *     title="StoreWarehouseRequest",
 *     @OA\Property(property="name", type="string", description=""),
 *     @OA\Property(property="location", type="string", description=""),
 *     @OA\Property(property="manager_id", type="string", description="Reference to another model")
 * )
 */
class StoreWarehouseRequestSchema
{
}