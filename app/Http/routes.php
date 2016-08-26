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
    return view('wlcome');
});

Route::get('/home', function () {
    return view('welcome');
});

//grupo de rortas do admin
Route::group(array('prefix' => 'admin', 'middleware' => 'auth.checkrole:admin', 'as' => 'admin.'), function () {

    //rotas das categorias
    Route::group(array('prefix' => 'categories', 'as' => 'categories.'), function () {

        Route::get('/', array('as' => 'index', 'uses' => 'CategoriesController@index'));
        Route::get('create', array('as' => 'create', 'uses' => 'CategoriesController@create'));
        Route::post('store', array('as' => 'store', 'uses' => 'CategoriesController@store'));
        Route::post('update/{id}', array('as' => 'update', 'uses' => 'CategoriesController@update'));
        Route::get('edit/{id}', array('as' => 'edit', 'uses' => 'CategoriesController@edit'));

    });

    //rotas dos produtos
    Route::group(array('prefix' => 'products', 'as' => 'products.'), function () {

        Route::get('/', array('as' => 'index', 'uses' => 'ProductsController@index'));
        Route::get('create', array('as' => 'create', 'uses' => 'ProductsController@create'));
        Route::post('store', array('as' => 'store', 'uses' => 'ProductsController@store'));
        Route::post('update/{id}', array('as' => 'update', 'uses' => 'ProductsController@update'));
        Route::get('edit/{id}', array('as' => 'edit', 'uses' => 'ProductsController@edit'));
        Route::get('destroy/{id}', array('as' => 'destroy', 'uses' => 'ProductsController@destroy'));

    });

    //rotas dos clients
    Route::group(array('prefix' => 'clients', 'as' => 'clients.'), function () {

        Route::get('/', array('as' => 'index', 'uses' => 'ClientsController@index'));
        Route::get('create', array('as' => 'create', 'uses' => 'ClientsController@create'));
        Route::post('store', array('as' => 'store', 'uses' => 'ClientsController@store'));
        Route::post('update/{id}', array('as' => 'update', 'uses' => 'ClientsController@update'));
        Route::get('edit/{id}', array('as' => 'edit', 'uses' => 'ClientsController@edit'));
        Route::get('destroy/{id}', array('as' => 'destroy', 'uses' => 'ClientsController@destroy'));

    });

    //rotas das orders
    Route::group(array('prefix' => 'orders', 'as' => 'orders.'), function () {

        Route::get('/', array('as' => 'index', 'uses' => 'OrdersController@index'));
        Route::get('edit/{id}', array('as' => 'edit', 'uses' => 'OrdersController@edit'));
        Route::post('update/{id}', array('as' => 'update', 'uses' => 'OrdersController@update'));

    });

    //rotas dos cupoms
    Route::group(array('prefix' => 'cupoms', 'as' => 'cupoms.'), function () {

        Route::get('/', array('as' => 'index', 'uses' => 'CupomsController@index'));
        Route::get('edit/{id}', array('as' => 'edit', 'uses' => 'CupomsController@edit'));
        Route::get('create', array('as' => 'create', 'uses' => 'CupomsController@create'));
        Route::post('update/{id}', array('as' => 'update', 'uses' => 'CupomsController@update'));
        Route::post('store', array('as' => 'store', 'uses' => 'CupomsController@store'));

    });

});

Route::group(array('prefix' => 'customer', 'middleware' => 'auth.checkrole:client', 'as' => 'customer.'), function () {

    //grupo de rotas as orders
    Route::group(array('prefix' => 'order', 'as' => 'order.'), function () {

        Route::get('/', array('as' => 'index', 'uses' => 'CheckoutController@index'));
        Route::get('create', array('as' => 'create', 'uses' => 'CheckoutController@create'));
        Route::post('store', array('as' => 'store', 'uses' => 'CheckoutController@store'));

    });

});

Route::post('oauth/access_token', function () {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(array('prefix' => 'api', 'middleware' => 'oauth', 'as' => 'api.'), function () {

    Route::resource('authenticated', 'Api\User\UserController', array('except' => array('create', 'edit', 'destroy', 'store', 'show')));

    Route::group(array('prefix' => 'client', 'middleware' => 'oauth.checkrole:client', 'as' => 'client.'), function () {
        Route::resource('order', 'Api\Client\ClientCheckoutController', array('except' => array('create', 'edit', 'destroy')));
    });

    Route::group(array('prefix' => 'deliverymen', 'middleware' => 'oauth.checkrole:deliverymen', 'as' => 'deliverymen.'), function () {
        Route::resource('order', 'Api\Deliverymen\DeliverymanController', array('except' => array('create', 'edit', 'destroy', 'store')));
        Route::patch('order/{id}/update-status',array('uses' => 'Api\Deliverymen\DeliverymanController@updateStatus', 'as' => 'orders.update_status'));
    });

});
