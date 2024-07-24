<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Http\Resources\PurchaseResource;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('items')->get();
        return Response::success(PurchaseResource::collection($purchases->load('supplier')), 'Purchases retrieved successfully');
    }

    public function store(StorePurchaseRequest $request)
    {
        $purchaseOrderNumber = $this->generatePurchaseOrderNumber();

        $purchase = Purchase::create([
            'id' => (string) Str::uuid(),
            'purchase_order_number' => $purchaseOrderNumber,
            'supplier_id' => $request->supplier_id,
            'order_date' => Carbon::createFromFormat('d-m-Y', $request->order_date)->format('Y-m-d'),
            'expected_delivery_date' => Carbon::createFromFormat('d-m-Y', $request->expected_delivery_date)->format('Y-m-d'),
            'total_amount' => 0,
        ]);

        return Response::success(new PurchaseResource($purchase->load('supplier')), 'Purchase created successfully', [], 201);
    }


    public function show(Purchase $purchase)
    {
        return Response::success(new PurchaseResource($purchase->load('items', 'supplier')), 'Purchase retrieved successfully');
    }

    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        $purchase->update([
            'expected_delivery_date' => $request->expected_delivery_date ? Carbon::createFromFormat('d-m-Y', $request->expected_delivery_date)->format('Y-m-d') : $purchase->expected_delivery_date,
            'status' => $request->status ?: $purchase->status,
        ]);

        return Response::success(new PurchaseResource($purchase), 'Purchase updated successfully');
    }

    public function destroy($id)
    {
        Purchase::findOrFail($id)->delete();
        return Response::success(null, 'Purchase deleted successfully', [], 204);
    }

    private function generatePurchaseOrderNumber()
    {
        $latestPurchase = Purchase::latest('created_at')->first();

        if (!$latestPurchase) {
            $number = 1;
        } else {
            $number = intval(substr($latestPurchase->purchase_order_number, 2)) + 1;
        }

        return 'PO' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }
}
