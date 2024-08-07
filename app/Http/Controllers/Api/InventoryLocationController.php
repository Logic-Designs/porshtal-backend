<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInventoryLocationRequest;
use App\Http\Requests\UpdateInventoryLocationRequest;
use App\Http\Resources\InventoryLocationResource;
use App\Models\InventoryLocation;
use Illuminate\Support\Facades\Response;

class InventoryLocationController extends Controller
{
    public function index()
    {
        $inventoryLocations = InventoryLocation::with('warehouse')->get();
        return Response::success(InventoryLocationResource::collection($inventoryLocations), 'Inventory locations retrieved successfully');
    }

    public function store(StoreInventoryLocationRequest $request)
    {
        $inventoryLocation = InventoryLocation::create([
            'warehouse_id' => $request->warehouse_id,
            'location_code' => $request->location_code,
            'description' => $request->description,
        ]);

        return Response::success(new InventoryLocationResource($inventoryLocation), 'Inventory location created successfully', [], 201);
    }

    public function show(InventoryLocation $inventoryLocation)
    {
        return Response::success(new InventoryLocationResource($inventoryLocation), 'Inventory location retrieved successfully');
    }

    public function update(UpdateInventoryLocationRequest $request, InventoryLocation $inventoryLocation)
    {
        $inventoryLocation->update([
            'warehouse_id' => $request->warehouse_id ?: $inventoryLocation->warehouse_id,
            'location_code' => $request->location_code ?: $inventoryLocation->location_code,
            'description' => $request->description ?: $inventoryLocation->description,
        ]);

        return Response::success(new InventoryLocationResource($inventoryLocation), 'Inventory location updated successfully');
    }

    public function destroy(InventoryLocation $inventoryLocation)
    {
        $inventoryLocation->delete();
        return Response::success(null, 'Inventory location deleted successfully', [], 204);
    }
}
