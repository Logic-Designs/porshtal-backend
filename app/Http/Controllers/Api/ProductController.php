<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Response::success(ProductResource::collection($products), 'Products retrieved successfully');
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'user_id' => $request->user_id, // Ensure this is included if required
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return Response::success(new ProductResource($product), 'Product created successfully', [], 201);
    }

    public function show(Product $product)
    {
        return Response::success(new ProductResource($product), 'Product retrieved successfully');
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name ?: $product->name,
            'description' => $request->description ?: $product->description,
            'price' => $request->price ?: $product->price,
        ]);

        return Response::success(new ProductResource($product), 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return Response::success(null, 'Product deleted successfully', [], 204);
    }
}
