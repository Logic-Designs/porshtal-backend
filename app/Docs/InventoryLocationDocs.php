<?php

namespace App\Docs;

use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name="InventoryLocationController",
 *     description="Operations related to InventoryLocationController"
 * )
 */

class InventoryLocationDocs
{
    /**
     * @OA\Get(
     *     path="/api/inventory-locations",
     *     tags={"InventoryLocationController"},
     *     summary="Get list of InventoryLocation",
     *     @OA\Response(
     *         response=200,
     *         description="List of InventoryLocation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/InventoryLocation"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/inventory-locations",
     *     tags={"InventoryLocationController"},
     *     summary="Create a new InventoryLocation",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/InventoryLocation")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="InventoryLocation created",
     *         @OA\JsonContent(ref="#/components/schemas/InventoryLocation")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/inventory-locations/{id}",
     *     tags={"InventoryLocationController"},
     *     summary="Get InventoryLocation by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="InventoryLocation ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="InventoryLocation details",
     *         @OA\JsonContent(ref="#/components/schemas/InventoryLocation")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/inventory-locations/{id}",
     *     tags={"InventoryLocationController"},
     *     summary="Update InventoryLocation by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="InventoryLocation ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/InventoryLocation")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="InventoryLocation updated",
     *         @OA\JsonContent(ref="#/components/schemas/InventoryLocation")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/inventory-locations/{id}",
     *     tags={"InventoryLocationController"},
     *     summary="Delete InventoryLocation by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="InventoryLocation ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="InventoryLocation deleted"
     *     )
     * )
     */
    public function destroy() {}
}
