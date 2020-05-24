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

    Route::get('getprdtype', 'AjaxProductController@getPrdType');


});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    Lfm::routes();
});
