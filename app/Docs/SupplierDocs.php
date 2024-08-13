<?php

namespace App\Docs;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Supplier",
 *     description="Operations related to Supplier"
 * )
 */

class SupplierDocs
{
    /**
     * @OA\Get(
     *     path="/api/suppliers",
     *     tags={"Supplier"},
     *     summary="Get list of Supplier",
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
     *         description="List of Supplier",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Supplier"))
     *     )
     * )
     */
    public function index(Request $request) {}

    /**
     * @OA\Post(
     *     path="/api/suppliers",
     *     tags={"Supplier"},
     *     summary="Create a new Supplier",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(ref="#/components/schemas/StoreSupplierRequest")
     *         )
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
     *     tags={"Supplier"},
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
     *     tags={"Supplier"},
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
     *     tags={"Supplier"},
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
