<?php

namespace App\Docs;

use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name="PurchaseItemController",
 *     description="Operations related to PurchaseItemController"
 * )
 */

class PurchaseItemDocs
{
    /**
     * @OA\Get(
     *     path="/api/purchase-items",
     *     tags={"PurchaseItemController"},
     *     summary="Get list of PurchaseItem",
     *     @OA\Response(
     *         response=200,
     *         description="List of PurchaseItem",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/PurchaseItem"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/purchase-items",
     *     tags={"PurchaseItemController"},
     *     summary="Create a new PurchaseItem",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PurchaseItem")
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
     *     tags={"PurchaseItemController"},
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
     *     tags={"PurchaseItemController"},
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
     *     tags={"PurchaseItemController"},
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
