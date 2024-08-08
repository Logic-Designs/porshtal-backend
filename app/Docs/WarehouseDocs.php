<?php

namespace App\Docs;

use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name="WarehouseController",
 *     description="Operations related to WarehouseController"
 * )
 */

class WarehouseDocs
{
    /**
     * @OA\Get(
     *     path="/api/warehouses",
     *     tags={"WarehouseController"},
     *     summary="Get list of Warehouse",
     *     @OA\Response(
     *         response=200,
     *         description="List of Warehouse",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Warehouse"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/warehouses",
     *     tags={"WarehouseController"},
     *     summary="Create a new Warehouse",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Warehouse")
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
     *     tags={"WarehouseController"},
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
     *     tags={"WarehouseController"},
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
     *     tags={"WarehouseController"},
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
