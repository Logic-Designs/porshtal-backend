<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PurchaseItem",
 *     type="object",
 *     title="PurchaseItem",
 *     @OA\Property(property="id", type="string", description=""),
 *     @OA\Property(property="purchase_id", type="string", description=""),
 *     @OA\Property(property="product_id", type="string", description="Reference to the Product model"),
 *     @OA\Property(property="quantity", type="string", description=""),
 *     @OA\Property(property="unit_price", type="string", description=""),
 *     @OA\Property(property="total_price", type="string", description="")
 * )
 */
class PurchaseItemSchema
{
}