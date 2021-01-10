<?php

use App\Product;
use App\ProductUserFavorites;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('buylog', function () {
   return view('backend.dashboard.buyLogs'); 
})->name('buylogs');

Route::get('/cart/{product}', function (Product $product) {
    return "Cart ${product}";
    //return view('frontend.cart');
})->name('cart');

Route::resource('carts', 'CartController');

Route::get('/agendar/{product}', function (Product $product) {
    return "agendar ${product}";
})->name('agendar');

Route::get('/comprar/{product}', 'OrderController@buyOne')->name('comprar')->middleware('auth');

Route::get('favorites','FavoriteController@index')->name('favorites')->middleware('auth');
Route::get('favorite/{product}/{user}','FavoriteController@destroy')->name('favorite_delete')->middleware('auth');

Route::get('/favorites/{product}', function (Product $product) {
    if(count($product->users()->wherePivot('user_id',Auth::user()->id)->get()) == 0){
          $product->users()->attach(Auth::user()->id);
           return redirect()->back();
    }
    return redirect()->back();
})->name('favorite')->middleware('auth');





Route::any('/filter','ProductController@SearchProduct')->name('filter');

Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController')->middleware('auth:api');
Route::resource('subcategory', 'SubCategoryController');
Route::resource('fornecedor', 'FornecedorController');
Route::resource('order', 'OrderController');
Route::post('orderWeb','OrderController@storeWeb')->name('order.storeWeb')->middleware('auth');
Route::resource('payment', 'PaymentController');
Route::resource('product', 'ProductController');
Route::resource('role', 'RoleController');
Route::resource('service', 'ServiceController');
Route::resource('status', 'StatusController');

Auth::routes();
Route::get('/home', 'Dashboard\DashboardController@index')->name('home')->middleware(['auth']);
Route::get('developers','DevelopersController@index')->name('developers.index')->middleware('auth');
Route::get('/index','RoleController@Webindex');