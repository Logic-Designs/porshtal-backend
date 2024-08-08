<?php

namespace App\Docs\Schema;;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Purchase",
 *     type="object",
 *     title="Purchase",
 *     required={"id"},
 *     @OA\Property(property="id", type="string"),
 *     @OA\Property(property="purchase_order_number", type="string"),
 *     @OA\Property(property="supplier_id", type="string"),
 *     @OA\Property(property="order_date", type="string"),
 *     @OA\Property(property="expected_delivery_date", type="string"),
 *     @OA\Property(property="total_amount", type="string"),
 *     @OA\Property(property="status", type="string")
 * )
 */
class PurchaseSchema
{
}