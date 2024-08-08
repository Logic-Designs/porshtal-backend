<?php

namespace App\Docs\Schema;;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     title="Product",
 *     required={"id"},
 *     @OA\Property(property="id", type="string"),
 *     @OA\Property(property="user_id", type="string"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="price", type="string")
 * )
 */
class ProductSchema
{
}