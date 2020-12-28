<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('category', 'CategoryController')->middleware('auth:api');
Route::resource('tag', 'TagController')->middleware('auth:api');
Route::resource('subcategory', 'SubCategoryController')->middleware('auth:api');
Route::resource('fornecedor', 'FornecedorController')->middleware('auth:api');
Route::resource('order', 'OrderController')->middleware('auth:api');
Route::resource('payment', 'PaymentController')->middleware('auth:api');
Route::resource('product', 'ProductController')->middleware('auth:api');
Route::resource('role', 'RoleController')->middleware('auth:api');
Route::resource('service', 'ServiceController')->middleware('auth:api');
Route::resource('status', 'StatusController')->middleware('auth:api');