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


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('category', 'CategoryController');

    Route::resource('productType', 'ProductTypeController');

    Route::resource('product', 'ProductController');

    Route::get('getprdtype', 'AjaxProductController@getPrdType');

    Route::get('order', 'OrderController@getOrder')->name('order.index');

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group(['namespace' => 'Client'], function () {
    Route::get('', 'HomeController@index')->name('home');

    Route::get('dang-ky', 'AuthController@getRegister')->name('get.register');
    Route::post('dang-ky', 'AuthController@postRegister')->name('post.register');

    Route::get('dang-nhap', 'AuthController@getLogin')->name('get.login');
    Route::post('dang-nhap', 'AuthController@postLogin')->name('post.login');

    Route::get('dang-xuat', 'AuthController@getLogout')->name('get.logout');

    Route::get('gioi-thieu', 'HomeController@about')->name('get.about');
    Route::get('lien-he', 'HomeController@contact')->name('get.contact');

    Route::group(['prefix' => 'gio-hang'], function () {
        Route::get('', 'CartController@getList')->name('list.cart');
        Route::get('add/{id}', 'CartController@addProduct')->name('add.cart');
        Route::get('del/{id}', 'CartController@delProduct')->name('del.cart');
        Route::group(['middleware' => 'CheckLoginUser'], function () {
            Route::get('thanh-toan', 'CartController@checkout')->name('checkout');
            Route::post('thanh-toan', 'CartController@saveInfoOrder');
            Route::get('thanh-cong', 'CartController@complete')->name('complete');
        });
    });

    Route::get('{c_slug}', 'CategoryController@list')->name('get.category');

    Route::get('{c_slug}/{prdType_slug}', 'ProductTypeController@list')->name('get.list.productType');

    Route::get('{c_slug}/{prdType_slug}/{prd_slug}', 'ProductController@detail')->name('get.detail.product');
});