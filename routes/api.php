<?php

use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\InventoryLocationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\PurchaseItemController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])
  ->middleware('auth:sanctum');

  Route::apiResource('purchases', PurchaseController::class);
  Route::apiResource('purchase-items', PurchaseItemController::class);
  Route::get('products', [ProductController::class, 'index']);
  Route::get('/suppliers', [SupplierController::class, 'index']);

  Route::apiResource('inventories', InventoryController::class);
    Route::apiResource('inventory-locations', InventoryLocationController::class);
    Route::apiResource('warehouses', WarehouseController::class);
Route::middleware('auth:sanctum')->group(function(){


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
