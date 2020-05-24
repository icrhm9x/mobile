<?php
Route::prefix('order')->group(function () {
    Route::get('', [
        'as' => 'order.index',
        'uses' => 'OrderController@index'
    ]);
    Route::get('orderDetail/{id}', [
        'as' => 'order.show',
        'uses' => 'OrderController@show'
    ]);
    Route::put('{order}', [
        'as' => 'order.update',
        'uses' => 'OrderController@update'
    ]);
    Route::delete('{order}', [
        'as' => 'order.destroy',
        'uses' => 'OrderController@destroy'
    ]);
});
