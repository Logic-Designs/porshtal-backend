<?php

namespace App\Docs\Schema;;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PurchaseItem",
 *     type="object",
 *     title="PurchaseItem",
 *     required={"id"},
 *     @OA\Property(property="id", type="string"),
 *     @OA\Property(property="purchase_id", type="string"),
 *     @OA\Property(property="product_id", type="string"),
 *     @OA\Property(property="quantity", type="string"),
 *     @OA\Property(property="unit_price", type="string"),
 *     @OA\Property(property="total_price", type="string")
 * )
 */
class PurchaseItemSchema
{
}