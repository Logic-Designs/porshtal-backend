<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Support\Facades\Response;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return Response::success(SupplierResource::collection($suppliers), 'Suppliers retrieved successfully');
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return Response::success(new SupplierResource($supplier), 'Supplier created successfully', [], 201);
    }

    public function show(Supplier $supplier)
    {
        return Response::success(new SupplierResource($supplier), 'Supplier retrieved successfully');
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update([
            'name' => $request->name ?: $supplier->name,
            'email' => $request->email ?: $supplier->email,
            'phone_number' => $request->phone_number ?: $supplier->phone_number,
        ]);

        return Response::success(new SupplierResource($supplier), 'Supplier updated successfully');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return Response::success(null, 'Supplier deleted successfully', [], 204);
    }
}
