<?php

namespace App\Docs\Schema;;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="InventoryLocation",
 *     type="object",
 *     title="InventoryLocation",
 *     required={"id"},
 *     @OA\Property(property="id", type="string"),
 *     @OA\Property(property="warehouse_id", type="string"),
 *     @OA\Property(property="location_code", type="string"),
 *     @OA\Property(property="description", type="string")
 * )
 */
class InventoryLocationSchema
{
}