<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     title="Product",
 *     @OA\Property(property="id", type="string", description=""),
 *     @OA\Property(property="name", type="string", description=""),
 *     @OA\Property(property="description", type="string", description=""),
 *     @OA\Property(property="price", type="string", description="")
 * )
 */
class ProductSchema
{
}