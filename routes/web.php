<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('/products', function () {
    return view('category_products');
});
Route::get('/about_us', function () {
    return view('about_us');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin/products_overview', 'ProductController@view_products');
Route::get('/admin/add_product', 'ProductController@view_add_product');
Route::post('/admin/add_product', 'ProductController@add_product');
