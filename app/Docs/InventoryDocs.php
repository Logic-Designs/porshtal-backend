<?php

namespace App\Docs;

use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name="InventoryController",
 *     description="Operations related to InventoryController"
 * )
 */

class InventoryDocs
{
    /**
     * @OA\Get(
     *     path="/api/inventories",
     *     tags={"InventoryController"},
     *     summary="Get list of Inventory",
     *     @OA\Response(
     *         response=200,
     *         description="List of Inventory",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Inventory"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/inventories",
     *     tags={"InventoryController"},
     *     summary="Create a new Inventory",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Inventory")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Inventory created",
     *         @OA\JsonContent(ref="#/components/schemas/Inventory")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/inventories/{id}",
     *     tags={"InventoryController"},
     *     summary="Get Inventory by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Inventory ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Inventory details",
     *         @OA\JsonContent(ref="#/components/schemas/Inventory")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/inventories/{id}",
     *     tags={"InventoryController"},
     *     summary="Update Inventory by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Inventory ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Inventory")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Inventory updated",
     *         @OA\JsonContent(ref="#/components/schemas/Inventory")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/inventories/{id}",
     *     tags={"InventoryController"},
     *     summary="Delete Inventory by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Inventory ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Inventory deleted"
     *     )
     * )
     */
    public function destroy() {}
}
