<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="StoreSupplierRequest",
 *     type="object",
 *     title="StoreSupplierRequest",
 *     @OA\Property(property="name", type="string", description=""),
 *     @OA\Property(property="email", type="string", description=""),
 *     @OA\Property(property="phone_number", type="string", description="")
 * )
 */
class StoreSupplierRequestSchema
{
}