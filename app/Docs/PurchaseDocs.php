<?php

namespace App\Docs;

use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name="PurchaseController",
 *     description="Operations related to PurchaseController"
 * )
 */

class PurchaseDocs
{
    /**
     * @OA\Get(
     *     path="/api/purchases",
     *     tags={"PurchaseController"},
     *     summary="Get list of Purchase",
     *     @OA\Response(
     *         response=200,
     *         description="List of Purchase",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Purchase"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/purchases",
     *     tags={"PurchaseController"},
     *     summary="Create a new Purchase",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Purchase")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Purchase created",
     *         @OA\JsonContent(ref="#/components/schemas/Purchase")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/purchases/{id}",
     *     tags={"PurchaseController"},
     *     summary="Get Purchase by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Purchase ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Purchase details",
     *         @OA\JsonContent(ref="#/components/schemas/Purchase")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/purchases/{id}",
     *     tags={"PurchaseController"},
     *     summary="Update Purchase by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Purchase ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Purchase")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Purchase updated",
     *         @OA\JsonContent(ref="#/components/schemas/Purchase")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/purchases/{id}",
     *     tags={"PurchaseController"},
     *     summary="Delete Purchase by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Purchase ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Purchase deleted"
     *     )
     * )
     */
    public function destroy() {}
}
