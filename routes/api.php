<?php

use App\Http\Controllers\OrderBuyController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\OrderWarehouseController;
use App\Http\Controllers\OrderPlateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/listWarehouse', [WarehouseController::class, 'index'])->name('warehouses');

Route::get('/listRecipe', [RecipeController::class, 'index'])->name('recipe');

//Route::get('/listOrderWarehouse/{status}', [OrderWarehouseController::class, 'index'])->name('recipe');


Route::post('/listOrderWarehouse', [OrderWarehouseController::class, 'index'])->name('listOrderWarehouse');

Route::get('/generateOrder', [OrderPlateController::class, 'generatePlate'])->name('generatePlate');

Route::post('/createOrderPlate', [OrderPlateController::class, 'createOrderPlate'])->name('createOrderPlate');

Route::post('/listOrderKitchet', [OrderPlateController::class, 'index'])->name('listOrderKitche');

Route::get('/generateOrderWharehouse', [OrderPlateController::class, 'generateOrderWharehouse'])->name('generateOrderWharehouse');

Route::get('/listOrderBuys', [OrderBuyController::class, 'index'])->name('listOrderBuys');




