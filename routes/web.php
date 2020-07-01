<?php

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

Route::get('/', function () {
    return view('welcome');
});

//login
 Route::get('/auth/login',"Auth\LoginController@index")->name("auth.login");
 Route::post('/auth/login',"Auth\LoginController@login");

// register
Route::get('/register',"Auth\RegisterController@index");

Route::post('/auth/register',"Auth\RegisterController@register");
//dashboard
Route::get('/admin/dashboard',"Admin\DashboardController@index");
//user
Route::get('/home',"Auth\ProductsController@index")->name('home');
//auth
Route::get('/logout',"Auth\LogoutController@getLogout");

//PRODUCTS
Route::get('/insert',"Auth\ProductsController@table");
Route::get('/view',"Auth\ProductsController@view" )->name('view');
Route::get('/index',"Auth\ProductsController@dashboard" )->name("admin.dashboard");
// insert
Route::post('/products/insert',"Auth\ProductsController@store" );
//EDIT


Route::get('/index/{id}/edit', "Auth\ProductsController@edit");
Route::patch('/index/{id}',"Auth\ProductsController@update");
//DELETE 
Route::delete('/products/{id}', "Auth\ProductsController@destroy");
// DETAIL
Route::get('/auth/{id}/detail', "Auth\ProductsController@detail");

// SHOPPING CART
Route::get('/cart', "Auth\CartController@Shoppingcart")->name('cart');
Route::get('/carts', "Auth\CartController@index");
Route::get('/auth/{id}/cart', "Auth\CartController@storecart");
Route::delete('/carts/{id}', "Auth\CartController@destroy");


// users
Route::get('/users',"Admin\UserController@users");
Route::delete('/users/{id}', "Admin\UserController@destroy");
// search
Route::get('/products/search', "Auth\SearchController@search");

//CATEGORIES
Route::get('/index/category',"Auth\categoryController@index" )->name('categories');
// insert
Route::post('/categories/insert',"Auth\categoryController@store" );
//EDIT
Route::get('/categories/{id}/edit', "Auth\categoryController@edit");
Route::patch('/categories/{id}',"Auth\categoryController@update");
//DELETE 
Route::delete('/delecategory/{id}', "Auth\categoryController@destroy");

// PAYMENT
Route::get('/payment', "Auth\CartController@payment");
Route::get('/auth/{id}/payment', "Auth\CartController@payment");
Route::delete('/bills/{id}', "Auth\CartController@destroyBill");

// BILLS
Route::get('/bills', "Auth\CartController@bill");
Route::get('/auth/bill', "Auth\CartController@orders")->name('bills');


// Products category
Route::get('/categories/{id}', "User\HomeController@indexCategory");

// Sort
Route::get('sort/price',"Auth\ProductsController@sortBy");
Route::get('sortDesc/price',"Auth\ProductsController@sortDesc");