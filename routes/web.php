<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// defines the various login routes such as '/login'
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/catalogue', 'App\Http\Controllers\ProductController@getCatalogueView')->name('catalogue');

Route::get('/item/{id}', 'App\Http\Controllers\ProductController@getItemView')->name('product.show');

Route::post('add-to-cart', 'App\Http\Controllers\ProductController@addToCart')->name('product.addToCart');

Route::get('/cart', 'App\Http\Controllers\ProductController@getCartView')->name('product.viewCart');

Route::post('/clear-cart', 'App\Http\Controllers\ProductController@clearCart')->name('cart.clear');

Route::get('/cross-auth', 'App\Http\Controllers\Auth\CrossAuthController@authenticate');

Route::post('/clickstream-collect', 'App\Http\Controllers\ClickStreamController@collect')->name('clickstream.collect');
