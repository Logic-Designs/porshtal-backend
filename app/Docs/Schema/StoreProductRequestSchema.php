<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="StoreProductRequest",
 *     type="object",
 *     title="StoreProductRequest",
 *     @OA\Property(property="name", type="string", description=""),
 *     @OA\Property(property="description", type="string", description=""),
 *     @OA\Property(property="price", type="integer", description="")
 * )
 */
class StoreProductRequestSchema
{
}