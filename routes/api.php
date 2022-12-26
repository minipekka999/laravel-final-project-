<?php

use App\Http\Controllers\API\ProductController;
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

Route::group(['prefix' => 'product_id', 'middleware'=>['auth:api', 'admin']], function () {
    Route::post('/create', [App\Http\Controllers\API\ProductController::class, 'add']);
    Route::post('/save/{product_id}', [App\Http\Controllers\API\ProductController::class, 'update']);
    Route::post('/delete/{product_id}', [App\Http\Controllers\API\ProductController::class, 'delete']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/products', ProductController::class);
