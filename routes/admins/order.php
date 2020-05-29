<?php
Route::prefix('order')->group(function () {
    Route::get('', [
        'as' => 'order.index',
        'uses' => 'OrderController@index',
        'middleware' => 'can:rating_list'
    ]);
    Route::get('orderDetail/{id}', [
        'as' => 'order.show',
        'uses' => 'OrderController@show',
        'middleware' => 'can:order_detail'
    ]);
    Route::put('{order}', [
        'as' => 'order.update',
        'uses' => 'OrderController@update',
        'middleware' => 'can:order_status'
    ]);
    Route::delete('{order}', [
        'as' => 'order.destroy',
        'uses' => 'OrderController@destroy',
        'middleware' => 'can:order_delete'
    ]);
});
