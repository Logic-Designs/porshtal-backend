<?php

namespace App\Docs\Schema;;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Warehouse",
 *     type="object",
 *     title="Warehouse",
 *     required={"id"},
 *     @OA\Property(property="id", type="string"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="location", type="string"),
 *     @OA\Property(property="manager_id", type="string")
 * )
 */
class WarehouseSchema
{
}