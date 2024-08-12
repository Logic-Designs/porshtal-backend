<?php

namespace App\Http\Controllers\Api;

use App\Helpers\PaginationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Http\Resources\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class InventoryController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10); // Default to 10 items per page

        $inventories = Inventory::with('product', 'warehouse', 'location')
            ->search($search, ['serial_number'], [
                'product' => ['name'],
                'warehouse' => ['name'],
                'location' => ['location_code'],
            ]);


        $pagination = PaginationHelper::paginate($inventories, $perPage);

        return Response::success(InventoryResource::collection($pagination['data']), 'Inventories retrieved successfully', $pagination['pagination']);
    }

    public function store(StoreInventoryRequest $request)
    {
        $inventory = Inventory::create([
            'id' => (string) Str::uuid(),
            'product_id' => $request->product_id,
            'warehouse_id' => $request->warehouse_id,
            'quantity' => $request->quantity,
            'serial_number' => $request->serial_number,
            'location_id' => $request->location_id,
        ]);

        return Response::success(
            new InventoryResource($inventory),
            'Inventory created successfully',
            [],
            201
        );
    }

    public function show(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        return Response::success(
            new InventoryResource($inventory),
            'Inventory retrieved successfully'
        );
    }

    public function update(UpdateInventoryRequest $request, string $id)
    {
        $inventory = Inventory::findOrFail($id);

        $inventory->update([
            'product_id' => $request->product_id ?: $inventory->product_id,
            'warehouse_id' => $request->warehouse_id ?: $inventory->warehouse_id,
            'quantity' => $request->quantity ?: $inventory->quantity,
            'serial_number' => $request->serial_number ?: $inventory->serial_number,
            'location_id' => $request->location_id ?: $inventory->location_id,
        ]);

        return Response::success(
            new InventoryResource($inventory),
            'Inventory updated successfully'
        );
    }

    public function destroy(string $id)
    {
        Inventory::findOrFail($id)->delete();
        return Response::success(
            null,
            'Inventory deleted successfully',
            [],
            204
        );
    }
}
