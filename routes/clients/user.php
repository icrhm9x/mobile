<?php
Route::group(['middleware' => 'CheckLoginUser', 'prefix' => 'tai-khoan'], function () {
    //user
    Route::get('', 'UserController@index')->name('user.index');
    Route::post('update/{id}', 'UserController@update')->name('user.update');
    Route::get('don-hang', 'UserController@orderList')->name('user.orderList');
    //wish lish
    Route::get('yeu-thich', 'WishListController@index')->name('wishlist.index');
    Route::delete('yeu-thich/delete/{id}', 'WishListController@destroy')->name('wishlist.destroy');
});
Route::get('tai-khoan/yeu-thich/add/{id}', 'WishListController@store')->name('wishlist.store');

