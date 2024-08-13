<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="StorePurchaseItemRequest",
 *     type="object",
 *     title="StorePurchaseItemRequest",
 *     @OA\Property(property="purchase_id", type="string", description="Reference to another model"),
 *     @OA\Property(property="product_id", type="string", description="Reference to another model"),
 *     @OA\Property(property="quantity", type="integer", description="")
 * )
 */
class StorePurchaseItemRequestSchema
{
}