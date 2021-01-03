<?php

use App\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomePageController@index');
Route::get('/details/{product}','ProductController@Webshow')->name('product_detail');
Route::get('/cart/{product}', function (Product $product) {

   // return "Cart ${product}";
    return view('frontend.cart');
})->name('cart');

Route::resource('carts', 'CartController');


Route::get('/agendar/{product}', function (Product $product) {
    return "agendar ${product}";
})->name('agendar');

Route::get('/comprar/{product}', function (Product $product) {
    return "comprar ${product}";
})->name('comprar');

Route::get('/favorites/{product}', function (Product $product) {
    return "favoritos ${product}";
})->name('favorite');




Route::any('/filter','ProductController@SearchProduct')->name('filter');

Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController')->middleware('auth:api');
Route::resource('subcategory', 'SubCategoryController');
Route::resource('fornecedor', 'FornecedorController');
Route::resource('order', 'OrderController');
Route::resource('payment', 'PaymentController');
Route::resource('product', 'ProductController');
Route::resource('role', 'RoleController');
Route::resource('service', 'ServiceController');
Route::resource('status', 'StatusController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('developers','DevelopersController@index')->name('developers.index')->middleware('auth');
Route::get('/index','RoleController@Webindex');