<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Purchase",
 *     type="object",
 *     title="Purchase",
 *     @OA\Property(property="id", type="string", description=""),
 *     @OA\Property(property="purchase_order_number", type="string", description=""),
 *     @OA\Property(property="supplier_id", type="string", description="Reference to the Supplier model"),
 *     @OA\Property(property="order_date", type="string", description=""),
 *     @OA\Property(property="expected_delivery_date", type="string", description=""),
 *     @OA\Property(property="total_amount", type="string", description=""),
 *     @OA\Property(property="status", type="string", description="")
 * )
 */
class PurchaseSchema
{
}