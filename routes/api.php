<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
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

Route::post('login',[LoginController::class, 'login']);

Route::get('products/list',[ProductsController::class, 'index'])->middleware('auth:api');
Route::post('products/delete',[ProductsController::class, 'delete'])->middleware('auth:api');;
Route::post('products/save',[ProductsController::class, 'save'])->middleware('auth:api');;

Route::get('products/brands',[ProductsController::class, 'brands']);


