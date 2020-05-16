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

use UniSharp\LaravelFilemanager\Lfm;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'AuthController@getLogin')->name('get.admin.login');
    Route::post('login', 'AuthController@postLogin')->name('post.admin.login');

    Route::get('logout', 'AuthController@getLogout')->name('get.admin.logout');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'CheckLoginAdmin'], function () {

    Route::get('/', 'HomeController@show')->name('admin.home');

    Route::resource('category', 'CategoryController')->except(['create']);

    Route::resources([
        'productType' => 'ProductTypeController',
        'product' => 'ProductController',
        'news' => 'NewsController',
        'member' => 'MemberController'
    ]);

    Route::get('getprdtype', 'AjaxProductController@getPrdType');

    Route::get('rating', 'RatingController@show')->name('rating.index');
    Route::delete('rating/{id}', 'RatingController@destroy');

    Route::get('order', 'OrderController@getOrder')->name('order.index');
    Route::delete('order/{id}', 'OrderController@destroy');

    Route::get('orderDetail/{id}', 'OrderDetailController@show');


});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    Lfm::routes();
});


Route::group(['namespace' => 'Client'], function () {
    Route::get('', 'HomeController@index')->name('home');

    Route::get('dang-ky', 'AuthController@getRegister')->name('get.register');
    Route::post('dang-ky', 'AuthController@postRegister')->name('post.register');

    Route::get('dang-nhap', 'AuthController@getLogin')->name('get.login');
    Route::post('dang-nhap', 'AuthController@postLogin')->name('post.login');

    Route::get('quen-mat-khau', 'AuthController@getForgotPassword')->name('get.forgot.password');
    Route::post('quen-mat-khau', 'AuthController@codeForgotPassword')->name('code.forgot.password');

    Route::get('doi-mat-khau', 'AuthController@getResetPassword')->name('get.reset.password');
    Route::post('doi-mat-khau', 'AuthController@postResetPassword');

    Route::get('dang-xuat', 'AuthController@getLogout')->name('get.logout');

    Route::get('gioi-thieu', 'HomeController@about')->name('get.about');
    Route::get('lien-he', 'HomeController@contact')->name('get.contact');

    Route::group(['prefix' => 'gio-hang'], function () {
        Route::get('', 'CartController@getList')->name('list.cart');
        Route::get('add/{id}', 'CartController@addCart')->name('add.cart');
        Route::get('update', 'CartController@updateCart')->name('update.cart');
        Route::get('del/{id}', 'CartController@delCart')->name('del.cart');

        Route::group(['middleware' => 'CheckLoginUser'], function () {
            Route::get('thanh-toan', 'CartController@checkout')->name('checkout');
            Route::post('thanh-toan', 'CartController@saveInfoOrder');
            Route::get('thanh-cong', 'CartController@complete')->name('complete');
        });
    });

    Route::group(['prefix' => 'ajax', 'middleware' => 'CheckLoginUser'], function () {
        Route::post('danh-gia/{id}', 'RatingController@saveRating')->name('post.rating');
    });

    Route::get('tin-tuc', 'NewsController@show')->name('get.list.news');
    Route::get('tin-tuc/{n_slug}', 'NewsController@detail')->name('get.detail.news');

    Route::get('tim-kiem', 'SearchController@list')->name('get.list.search');

    Route::get('{c_slug}', 'CategoryController@list')->name('get.category');

    Route::get('{c_slug}/{prdType_slug}', 'ProductTypeController@list')->name('get.list.productType');

    Route::get('{c_slug}/{prdType_slug}/{prd_slug}', 'ProductController@detail')->name('get.detail.product');
});
