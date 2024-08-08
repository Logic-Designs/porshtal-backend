<?php

namespace App\Docs;

use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name="ProductController",
 *     description="Operations related to ProductController"
 * )
 */

class ProductDocs
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"ProductController"},
     *     summary="Get list of Product",
     *     @OA\Response(
     *         response=200,
     *         description="List of Product",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Product"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"ProductController"},
     *     summary="Create a new Product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     tags={"ProductController"},
     *     summary="Get Product by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product details",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     tags={"ProductController"},
     *     summary="Update Product by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product updated",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     tags={"ProductController"},
     *     summary="Delete Product by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Product ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Product deleted"
     *     )
     * )
     */
    public function destroy() {}
}
