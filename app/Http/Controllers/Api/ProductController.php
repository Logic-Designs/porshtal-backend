<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('price', 'LIKE', "%{$search}%"); // Adjust or remove as needed
            });
        })
        ->get();

        return Response::success(ProductResource::collection($products), 'Products retrieved successfully');
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
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
