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
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::post('/logout', 'SessionController@destroy');

// Products & Categories
Route::get('/product/{product}', 'HomeController@show')->name('product');
Route::get('/category/{category}', 'CategoryController@show')->name('category');
Route::get('/categoryoverview', 'CategoryController@index')->name('categories');


// Shoppingcart
Route::get('/shoppingcart/index', 'ShoppingCartController@index')->name('purchaseHistory');
Route::post('/shoppingcart/store', 'ShoppingCartController@store');
Route::post('/shoppingcart/remove', 'ShoppingCartController@remove');
Route::post('/shoppingcart/removeAll', 'ShoppingCartController@removeAll');
Route::post('/shoppingcart/empty', 'ShoppingCartController@emptyCart');
Route::get('/shoppingcart/edit/{product}', 'ShoppingCartController@edit');
Route::post('/shoppingcart/edit', 'ShoppingCartController@update');
Route::get('/shoppingcart/purchase', 'ShoppingCartController@purchase')->name('shoppingCartPurchase');
Route::get('/shoppingcart', 'ShoppingCartController@show')->name('shoppingCart');

// User (my account)
Route::get('/user', 'UserController@user')->name('account');
Route::post('/user/update', 'UserController@updateUser');

// Review
Route::post('/postReview', 'ReviewController@store');
Route::post('/reviews/remove/{id}', 'ReviewController@destroy');

// Search
Route::get('/search', 'SearchController@index')->name('search');

// Admin
Route::get('/admin/dashboard', 'AdminController@index');

// products CRUD
Route::get('/admin/products', 'ProductController@index');
Route::get('/admin/products/create', 'ProductController@create');
Route::get('/admin/products/edit/{id}', 'ProductController@edit');
Route::post('/admin/products/edit', 'ProductController@update');
Route::post('/admin/products/store', 'productController@store');
Route::post('/admin/products/remove/{id}', 'ProductController@remove');

// users CRUD
Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/create', 'UserController@create');
Route::get('/admin/users/edit/{id}', 'UserController@edit');
Route::post('/admin/users/edit', 'UserController@update');
Route::post('/admin/users/store', 'UserController@store');
Route::post('/admin/users/remove/{id}', 'UserController@remove');

// categories CRUD
Route::get('/admin/categories', 'CategoryController@categoryIndex');
Route::get('/admin/categories/create', 'CategoryController@create');
Route::get('/admin/categories/edit/{category}', 'CategoryController@edit');
Route::post('/admin/categories/edit', 'CategoryController@update');
Route::post('/admin/categories/store', 'CategoryController@store');
Route::post('/admin/categories/remove/{category}', 'CategoryController@remove');

// orders CRUD
Route::get('/admin/orders', 'OrderController@index');
Route::get('/admin/orders/create', 'OrderController@create');
Route::get('/admin/orders/edit/{order}', 'OrderController@edit');
Route::get('/admin/orders/edit/{order}/{product}', 'OrderController@updateProduct');
Route::get('/admin/orders/remove/{order}/{product}', 'OrderController@removeProduct');
Route::post('/admin/orders/update/{order}', 'OrderController@update');
Route::post('/admin/orders/goback', 'OrderController@goBack');
Route::post('/admin/orders/edit', 'OrderController@update');
Route::post('/admin/orders/store', 'OrderController@store');
Route::post('/admin/orders/remove/{category}', 'OrderController@remove');

//Pages without controllers
// about
Route::get('/about', function () {
    return view('pages/about');
})->name('about');

// db EER
Route::get('/database_eer', function () {
    return view('designs/eer');
})->name('dbEER');

// Wireframes