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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'WelcomeController@view_landing');
Route::get('/choose_lang/{locale}', 'WelcomeController@choose_lang');


Route::group(['prefix' => '{language}', 'middleware' => 'verifyLocale'], function () {
    
    Route::get('/', 'WelcomeController@index');
    Route::get('/set_cookie', 'WelcomeController@set_cookie');
    Route::post('/add_subscriber', 'SubscriberController@add_subscriber');
    Route::get('/subscriber_confirmation', 'SubscriberController@get_confirmation');

    Route::get('/category/{id}/{category}', 'WelcomeController@category_products');
    Route::get('/products_filter', 'WelcomeController@products_filter');
    //Route::get('/product_details/{id}/{name}', 'WelcomeController@product_details');
    Route::get('/{category}/{id}/{name}', 'WelcomeController@product_details');
    
    Route::get('/search', 'WelcomeController@view_search');
    Route::get('/search_products', 'WelcomeController@search_products');
    Route::get('/faq', 'WelcomeController@view_faq');
    Route::get('/search_faq', 'WelcomeController@search_faq');
    Route::get('/about_us', 'WelcomeController@view_about_us');
    Route::post('/contact', 'WelcomeController@contact');
    Route::get('/contact_confirmation', 'WelcomeController@contact_confirmation');
});




Route::group(['prefix' => 'admin'], function () {
    Route::get('/products_overview', 'ProductController@view_products');
    Route::get('/add_product', 'ProductController@view_add_product');
    Route::post('/add_product', 'ProductController@add_product');
    Route::get('/edit_product/{id}', 'ProductController@view_edit_product');
    Route::post('/edit_product', 'ProductController@edit_product');
    Route::post('/delete_img', 'ProductController@delete_image');
    Route::get('/delete_product/{id}', 'ProductController@delete_product');
    Route::get('/faqs_overview', 'FaqController@view_faqs');
    Route::get('/add_faq', 'FaqController@view_add_faq');
    Route::post('/add_faq', 'FaqController@add_faq');
    Route::get('/edit_faq/{id}', 'FaqController@view_edit_faq');
    Route::post('/edit_faq', 'FaqController@edit_faq');
    Route::get('/delete_faq/{id}', 'FaqController@delete_faq');
    Route::get('/set_hot_items', 'ProductController@view_set_hot_items');
    Route::post('/set_hot_items', 'ProductController@set_hot_items');
    Route::get('/subscribers_overview', 'SubscriberController@view_subscribers');
    Route::get('/delete_subscriber/{id}', 'SubscriberController@delete_subscriber');
});


