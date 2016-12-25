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
Route::get('/set_cookie', 'WelcomeController@set_cookie');

Route::get('/products/{id}', 'WelcomeController@category_products');
Route::get('/product_details/{id}', 'WelcomeController@product_details');

Route::get('/about_us', 'WelcomeController@about_us');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin/products_overview', 'ProductController@view_products');
Route::get('/admin/add_product', 'ProductController@view_add_product');
Route::post('/admin/add_product', 'ProductController@add_product');
Route::get('/admin/edit_product/{id}', 'ProductController@view_edit_product');
Route::get('/admin/faqs_overview', 'FaqController@view_faqs');
Route::get('/admin/add_faq', 'FaqController@view_add_faq');
Route::post('/admin/add_faq', 'FaqController@add_faq');
