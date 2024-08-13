<?php

namespace App\Docs;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Inventory",
 *     description="Operations related to Inventory"
 * )
 */

class InventoryDocs
{
    /**
     * @OA\Get(
     *     path="/api/inventories",
     *     tags={"Inventory"},
     *     summary="Get list of Inventory",
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
     *         description="List of Inventory",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Inventory"))
     *     )
     * )
     */
    public function index(Request $request) {}

    /**
     * @OA\Post(
     *     path="/api/inventories",
     *     tags={"Inventory"},
     *     summary="Create a new Inventory",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(ref="#/components/schemas/StoreInventoryRequest")
     *         )
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
     *     tags={"Inventory"},
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
     *     tags={"Inventory"},
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
     *     tags={"Inventory"},
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
