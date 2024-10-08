<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Warehouse",
 *     type="object",
 *     title="Warehouse",
 *     @OA\Property(property="id", type="string", description=""),
 *     @OA\Property(property="name", type="string", description=""),
 *     @OA\Property(property="location", type="string", description=""),
 *     @OA\Property(property="manager_id", type="string", description="")
 * )
 */
class WarehouseSchema
{
}