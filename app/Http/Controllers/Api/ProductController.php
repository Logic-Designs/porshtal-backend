<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
