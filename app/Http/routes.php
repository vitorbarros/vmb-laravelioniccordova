<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/categories', array('as' => 'admin.categories.index', 'uses' => 'CategoriesController@index'));
Route::get('/admin/categories/create', array('as' => 'admin.categories.create', 'uses' => 'CategoriesController@create'));
Route::post('/admin/categories/store', array('as' => 'admin.categories.store', 'uses' => 'CategoriesController@store'));
Route::post('/admin/categories/update/{id}', array('as' => 'admin.categories.update', 'uses' => 'CategoriesController@update'));
Route::get('/admin/categories/edit/{id}', array('as' => 'admin.categories.edit', 'uses' => 'CategoriesController@edit'));

Route::get('/admin/products', array('as' => 'admin.products.index', 'uses' => 'ProductsController@index'));
Route::get('/admin/products/create', array('as' => 'admin.products.create', 'uses' => 'ProductsController@create'));
Route::post('/admin/products/store', array('as' => 'admin.products.store', 'uses' => 'ProductsController@store'));
Route::post('/admin/products/update/{id}', array('as' => 'admin.products.update', 'uses' => 'ProductsController@update'));
Route::get('/admin/products/edit/{id}', array('as' => 'admin.products.edit', 'uses' => 'ProductsController@edit'));