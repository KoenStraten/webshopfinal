<?php

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

Route::get('/', 'HomeController@index')->name('home');


//Authentication
Route::get('/register', 'RegistrationController@create');
Route::post('/register/', 'RegistrationController@store');
Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::post('/logout', 'SessionController@destroy');

Route::get('/product/{product}', 'HomeController@show')->name('product');

Route::get('/category/{category}', 'CategoryController@show')->name('category');
Route::get('/categoryoverview/', 'CategoryController@index')->name('categories');

Route::post('/shoppingcart/store/', 'ShoppingCartController@store');
Route::post('/shoppingcart/remove', 'ShoppingCartController@remove');

Route::post('/shoppingcart/removeAll', 'ShoppingCartController@removeAll');
Route::post('/shoppingcart/empty/', 'ShoppingCartController@emptyCart');
Route::get('/shoppingcart/edit/{product}', 'ShoppingCartController@edit');
Route::post('/shoppingcart/edit', 'ShoppingCartController@update');
Route::get('/shoppingcart/purchase', 'ShoppingCartController@purchase')->name('shoppingCartPurchase');
Route::get('/shoppingcart', 'ShoppingCartController@show')->name('shoppingCart');

Route::get('/user', 'UserController@user');

//Auth::routes();

Route::post('/postReview', 'ReviewController@store');

Route::get('/search', 'SearchController@index');

/*Admin*/
Route::get('/admin/dashboard', 'AdminController@index');

Route::get('/admin/products', 'ProductController@index');
Route::get('/admin/products/create', 'ProductController@create');
Route::get('/admin/products/edit/{id}', 'ProductController@edit');
Route::post('/admin/products/edit', 'ProductController@update');
Route::post('/admin/products/store', 'productController@store');
Route::post('/admin/products/remove/{id}', 'ProductController@remove');

Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/create', 'UserController@create');
Route::get('/admin/users/edit/{id}', 'UserController@edit');
Route::post('/admin/users/edit', 'UserController@update');
Route::post('/admin/users/store', 'UserController@store');
Route::post('/admin/users/remove/{id}', 'UserController@remove');

Route::get('/admin/categories', 'CategoryController@categoryIndex');
Route::get('/admin/categories/create', 'CategoryController@create');
Route::get('/admin/categories/edit/{category}', 'CategoryController@edit');
Route::post('/admin/categories/edit', 'CategoryController@update');
Route::post('/admin/categories/store', 'CategoryController@store');
Route::post('/admin/categories/remove/{category}', 'CategoryController@remove');

/*Pages without controllers*/
Route::get('/about', function () {
    return view('pages/about');
})->name('about');

Route::get('/database_eer', function () {
    return view('designs/eer');
})->name('dbEER');