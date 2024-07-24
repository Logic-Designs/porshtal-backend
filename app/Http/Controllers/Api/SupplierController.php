<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return Response::success(SupplierResource::collection($suppliers), 'suppliers retrieved successfully');
    }
}
