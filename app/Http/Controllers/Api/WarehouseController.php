<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;
use App\Http\Resources\WarehouseResource;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return Response::success(WarehouseResource::collection($warehouses), 'Warehouses retrieved successfully');
    }

    public function store(StoreWarehouseRequest $request)
    {
        $warehouse = Warehouse::create([
            'id' => (string) Str::uuid(),
            'name' => $request->name,
            'location' => $request->location,
            'manager_id' => $request->manager_id,
        ]);

        return Response::success(new WarehouseResource($warehouse), 'Warehouse created successfully', [], 201);
    }

    public function show(Warehouse $warehouse)
    {
        return Response::success(new WarehouseResource($warehouse), 'Warehouse retrieved successfully');
    }

    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->update([
            'name' => $request->name ?: $warehouse->name,
            'location' => $request->location ?: $warehouse->location,
            'manager_id' => $request->manager_id ?: $warehouse->manager_id,
        ]);

        return Response::success(new WarehouseResource($warehouse), 'Warehouse updated successfully');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return Response::success(null, 'Warehouse deleted successfully', [], 204);
    }
}
