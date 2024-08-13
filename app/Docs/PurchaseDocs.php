<?php

namespace App\Docs;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Purchase",
 *     description="Operations related to Purchase"
 * )
 */

class PurchaseDocs
{
    /**
     * @OA\Get(
     *     path="/api/purchases",
     *     tags={"Purchase"},
     *     summary="Get list of Purchase",
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
     *         description="List of Purchase",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Purchase"))
     *     )
     * )
     */
    public function index(Request $request) {}

    /**
     * @OA\Post(
     *     path="/api/purchases",
     *     tags={"Purchase"},
     *     summary="Create a new Purchase",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(ref="#/components/schemas/StorePurchaseRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Purchase created",
     *         @OA\JsonContent(ref="#/components/schemas/Purchase")
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/purchases/{id}",
     *     tags={"Purchase"},
     *     summary="Get Purchase by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Purchase ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Purchase details",
     *         @OA\JsonContent(ref="#/components/schemas/Purchase")
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/purchases/{id}",
     *     tags={"Purchase"},
     *     summary="Update Purchase by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Purchase ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="expected_delivery_date",
     *                     type="string",
     *                     format="date",
     *                     nullable=true,
     *                     description="The expected delivery date in d-m-Y format"
     *                 ),
     *                 @OA\Property(
     *                     property="supplier_id",
     *                     type="string",
     *                     nullable=true,
     *                     description="The ID of the supplier, must exist in the suppliers table"
     *                 ),
     *                 @OA\Property(
     *                     property="status",
     *                     type="string",
     *                     nullable=true,
     *                     description="The status of the purchase, one of: open, pending, completed, cancelled"
     *                 ),
     *                 example={
     *                     "expected_delivery_date": "15-08-2024",
     *                     "supplier_id": "1",
     *                     "status": "completed"
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Purchase updated",
     *         @OA\JsonContent(ref="#/components/schemas/Purchase")
     *     )
     * )
     */
    public function update() {}


    /**
     * @OA\Delete(
     *     path="/api/purchases/{id}",
     *     tags={"Purchase"},
     *     summary="Delete Purchase by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Purchase ID",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Purchase deleted"
     *     )
     * )
     */
    public function destroy() {}
}
