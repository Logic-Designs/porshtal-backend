<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseItemRequest;
use App\Http\Requests\UpdatePurchaseItemRequest;
use App\Http\Resources\PurchaseItemResource;
use App\Models\Product;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class PurchaseItemController extends Controller
{
    public function index()
    {
        $purchaseItems = PurchaseItem::all();
        return Response::success(PurchaseItemResource::collection($purchaseItems), 'Purchase items retrieved successfully');
    }

    public function store(StorePurchaseItemRequest $request)
    {
        $purchaseItem = PurchaseItem::create([
            'id' => (string) Str::uuid(),
            'purchase_id' => $request->purchase_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return Response::success(new PurchaseItemResource($purchaseItem), 'Purchase item created successfully', [], 201);
    }

    public function show($id)
    {
        $purchaseItem = PurchaseItem::findOrFail($id);
        return Response::success(new PurchaseItemResource($purchaseItem), 'Purchase item retrieved successfully');
    }

    public function update(UpdatePurchaseItemRequest $request, PurchaseItem $purchaseItem)
    {
        $purchaseItem->update($request->validated());
        return Response::success(new PurchaseItemResource($purchaseItem), 'Purchase item updated successfully');
    }

    public function destroy(PurchaseItem $purchaseItem)
    {
        $purchaseItem->delete();
        return Response::success(null, 'Purchase item deleted successfully', [], 204);
    }
}
