<?php
Route::group(['prefix' => 'admin'], function () {

    Route::get('/', 'HomeController@show')->name('admin.home');

    Route::get('getprdtype', 'AjaxProductController@getPrdType');
});
