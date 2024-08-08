<?php

namespace App\Docs;

use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name="SupplierController",
 *     description="Operations related to SupplierController"
 * )
 */

class SupplierDocs
{
    /**
     * @OA\Get(
     *     path="/api/suppliers",
     *     tags={"SupplierController"},
     *     summary="Get list of Supplier",
     *     @OA\Response(
     *         response=200,
     *         description="List of Supplier",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Supplier"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/suppliers",
     *     tags={"SupplierController"},
     *     summary="Create a new Supplier",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Supplier created",
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/suppliers/{id}",
     *     tags={"SupplierController"},
     *     summary="Get Supplier by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Supplier ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Supplier details",
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/suppliers/{id}",
     *     tags={"SupplierController"},
     *     summary="Update Supplier by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Supplier ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Supplier updated",
     *         @OA\JsonContent(ref="#/components/schemas/Supplier")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/suppliers/{id}",
     *     tags={"SupplierController"},
     *     summary="Delete Supplier by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Supplier ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Supplier deleted"
     *     )
     * )
     */
    public function destroy() {}
}
