<?php

namespace App\Docs;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Warehouse",
 *     description="Operations related to Warehouse"
 * )
 */

class WarehouseDocs
{
    /**
     * @OA\Get(
     *     path="/api/warehouses",
     *     tags={"Warehouse"},
     *     summary="Get list of Warehouse",
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
     *         description="List of Warehouse",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Warehouse"))
     *     )
     * )
     */
    public function index(Request $request) {}

    /**
     * @OA\Post(
     *     path="/api/warehouses",
     *     tags={"Warehouse"},
     *     summary="Create a new Warehouse",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(ref="#/components/schemas/StoreWarehouseRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Warehouse created",
     *         @OA\JsonContent(ref="#/components/schemas/Warehouse")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/warehouses/{id}",
     *     tags={"Warehouse"},
     *     summary="Get Warehouse by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Warehouse ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Warehouse details",
     *         @OA\JsonContent(ref="#/components/schemas/Warehouse")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/warehouses/{id}",
     *     tags={"Warehouse"},
     *     summary="Update Warehouse by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Warehouse ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Warehouse")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Warehouse updated",
     *         @OA\JsonContent(ref="#/components/schemas/Warehouse")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/warehouses/{id}",
     *     tags={"Warehouse"},
     *     summary="Delete Warehouse by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Warehouse ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Warehouse deleted"
     *     )
     * )
     */
    public function destroy() {}
}
