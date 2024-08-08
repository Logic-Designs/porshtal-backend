<?php

namespace App\Docs;

use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name="UserController",
 *     description="Operations related to UserController"
 * )
 */

class UserDocs
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     tags={"UserController"},
     *     summary="Get list of User",
     *     @OA\Response(
     *         response=200,
     *         description="List of User",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/users",
     *     tags={"UserController"},
     *     summary="Create a new User",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/users/{id}",
     *     tags={"UserController"},
     *     summary="Get User by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User details",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/users/{id}",
     *     tags={"UserController"},
     *     summary="Update User by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User updated",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     tags={"UserController"},
     *     summary="Delete User by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="User deleted"
     *     )
     * )
     */
    public function destroy() {}
}
