<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::prefix('/v1')->controller(ProductController::class)->group(function () {
    Route::get('products/{id}', 'getProducts');
    Route::get('products/{category_id?}', 'getProducts');
    Route::post('products/', 'createProduct');
    Route::put('products/{id}', 'update');
    Route::delete('products/{id}', 'delete');
    Route::get('/categories', 'getCategory');
});