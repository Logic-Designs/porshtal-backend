<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="StorePurchaseRequest",
 *     type="object",
 *     title="StorePurchaseRequest",
 *     @OA\Property(property="order_date", type="string", description=""),
 *     @OA\Property(property="expected_delivery_date", type="string", description=""),
 *     @OA\Property(property="supplier_id", type="string", description="Reference to another model")
 * )
 */
class StorePurchaseRequestSchema
{
}