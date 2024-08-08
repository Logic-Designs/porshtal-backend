<?php

namespace App\Docs\Schema;;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Supplier",
 *     type="object",
 *     title="Supplier",
 *     required={"id"},
 *     @OA\Property(property="id", type="string"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="email", type="string"),
 *     @OA\Property(property="phone_number", type="string")
 * )
 */
class SupplierSchema
{
}