<?php

use App\Product;
use Illuminate\Support\Facades\Auth;
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

//default routes for unauthenticated users 
Route::get('/','HomePageController@index');

Route::get('/details/{product}','ProductController@Webshow')->name('product_detail');

Route::any('/filter','ProductController@SearchProduct')->name('filter');

Auth::routes();

Route::get('/home', 'Dashboard\DashboardController@index')->name('home')->middleware(['auth']);

Route::group(['middleware' => ['auth']], function () {
    //category route
         Route::resource('category', 'CategoryController');
    //subcategory route
        Route::resource('subcategory','SubCategoryController');
    //fornecedores
        Route::resource('fornecedor', 'FornecedorController');        
    //post route
        Route::resource('post', 'PostController');
        Route::resource('product', 'ProductController');
    //favorites routes
        Route::get('favorites','FavoriteController@index')->name('favorites');
        Route::get('favorite/{product}/{user}','FavoriteController@destroy')->name('favorite_delete');

        Route::get('/favorites/{product}', 'FavoriteController@add')->name('favorite');
    //orders or compras routes        
        Route::resource('order', 'OrderController');
        Route::post('orderWeb','OrderController@storeWeb')->name('order.storeWeb');
        Route::get('/comprar/{product}', 'OrderController@buyOne')->name('comprar');
        Route::post('carts/order','OrderController@storeCart')->name('order.cart');
    //carts routes
        Route::get('/carts','CartController@index')->name('carts');
        Route::get('/cart/{product}','CartController@add')->name('cart');
        Route::get('/getCarts','CartController@getCarts')->name('getCarts');
        Route::get('cart/remove/{cart}', 'CartController@destroy')->name('delete_cart');
        Route::get('/cartx/freeze', 'CartController@freeze')->name('empty_cart');
        

    //tag route
        Route::resource('tag', 'TagController');
    //payment route
        Route::resource('payment', 'PaymentController');
    //status route
        Route::resource('status', 'StatusController');
    //user route
        Route::resource('user', 'Auth\UserController');
        Route::get('profile','Auth\UserController@profile')->name('user.profile');
    //role route
        Route::resource('role', 'RoleController');
        Route::get('/index','RoleController@Webindex');
    //Developers route
        Route::get('developers','DevelopersController@index')->name('developers.index');     


    Route::get('buylog', function () {
        return view('backend.dashboard.buyLogs'); 
    })->name('buylogs');
    
    Route::get('/agendar/{product}', 'AgendarController@create')->name('agendar');
    Route::get('/agendar', 'AgendarController@store')->name('agendar.store');
    Route::get('/agendar/{id}', 'AgendarController@update')->name('agendar.update');
    Route::post('/agendar/delete/{id}', 'AgendarController@delete')->name('agendar.destroy');
});


Route::group(['middleware' => ['auth','it']], function () {
    
});

Route::group(['middleware' => ['auth']], function () {
    
});

Route::group(['middleware' => ['auth']], function () {
    
});

Route::group(['middleware' => ['auth']], function () {
    
});

Route::group(['middleware' => ['auth']], function () {
    
});