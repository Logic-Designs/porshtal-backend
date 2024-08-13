<?php

namespace App\Docs;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="InventoryLocation",
 *     description="Operations related to InventoryLocation"
 * )
 */

class InventoryLocationDocs
{
    /**
     * @OA\Get(
     *     path="/api/inventory-locations",
     *     tags={"InventoryLocation"},
     *     summary="Get list of InventoryLocation",
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
     *         description="List of InventoryLocation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/InventoryLocation"))
     *     )
     * )
     */
    public function index(Request $request) {}

    /**
     * @OA\Post(
     *     path="/api/inventory-locations",
     *     tags={"InventoryLocation"},
     *     summary="Create a new InventoryLocation",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(ref="#/components/schemas/StoreInventoryLocationRequest")
     *         )
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
     *     tags={"InventoryLocation"},
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
     *     tags={"InventoryLocation"},
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
     *     tags={"InventoryLocation"},
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
