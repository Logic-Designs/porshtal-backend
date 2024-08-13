<?php

namespace App\Docs\Schema;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     @OA\Property(property="name", type="string", description=""),
 *     @OA\Property(property="email", type="string", description=""),
 *     @OA\Property(property="password", type="string", description="")
 * )
 */
class UserSchema
{
}