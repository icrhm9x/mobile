<?php
Route::group(['prefix' => 'gio-hang'], function () {
    Route::get('', 'CartController@getList')->name('list.cart');
    Route::get('add/{id}', 'CartController@addCart')->name('add.cart');
    Route::get('update/{key}', 'CartController@updateCart')->name('update.cart');
    Route::delete('del/{key}', 'CartController@delCart')->name('del.cart');

    Route::group(['middleware' => 'CheckLoginUser'], function () {
        Route::get('thanh-toan', 'CartController@checkout')->name('checkout');
        Route::post('thanh-toan', 'CartController@saveInfoOrder');
        Route::get('thanh-cong', 'CartController@complete')->name('complete');
    });
});
