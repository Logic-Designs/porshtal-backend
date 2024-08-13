<?php

namespace App\Docs;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="PurchaseItem",
 *     description="Operations related to PurchaseItem"
 * )
 */

class PurchaseItemDocs
{
    /**
     * @OA\Get(
     *     path="/api/purchase-items",
     *     tags={"PurchaseItem"},
     *     summary="Get list of PurchaseItem",
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         required=false,
     *         description="Search query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         required=false,
     *         description="Number of items per page",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of PurchaseItem",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/PurchaseItem"))
     *     )
     * )
     */
    public function index(Request $request) {}

    /**
     * @OA\Post(
     *     path="/api/purchase-items",
     *     tags={"PurchaseItem"},
     *     summary="Create a new PurchaseItem",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(ref="#/components/schemas/StorePurchaseItemRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="PurchaseItem created",
     *         @OA\JsonContent(ref="#/components/schemas/PurchaseItem")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/purchase-items/{id}",
     *     tags={"PurchaseItem"},
     *     summary="Get PurchaseItem by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="PurchaseItem ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="PurchaseItem details",
     *         @OA\JsonContent(ref="#/components/schemas/PurchaseItem")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/purchase-items/{id}",
     *     tags={"PurchaseItem"},
     *     summary="Update PurchaseItem by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="PurchaseItem ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PurchaseItem")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="PurchaseItem updated",
     *         @OA\JsonContent(ref="#/components/schemas/PurchaseItem")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/purchase-items/{id}",
     *     tags={"PurchaseItem"},
     *     summary="Delete PurchaseItem by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="PurchaseItem ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="PurchaseItem deleted"
     *     )
     * )
     */
    public function destroy() {}
}
