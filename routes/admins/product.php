<?php
Route::prefix('product')->group(function () {
    Route::get('', [
        'as' => 'product.index',
        'uses' => 'ProductController@index',
        'middleware' => 'can:product_list'
    ]);
    Route::get('create', [
        'as' => 'product.create',
        'uses' => 'ProductController@create',
        'middleware' => 'can:product_add'
    ]);
    Route::post('', [
        'as' => 'product.store',
        'uses' => 'ProductController@store'
    ]);
    Route::get('{product}/edit', [
        'as' => 'product.edit',
        'uses' => 'ProductController@edit',
        'middleware' => 'can:product_edit'
    ]);
    Route::put('{product}', [
        'as' => 'product.update',
        'uses' => 'ProductController@update'
    ]);
    Route::delete('{product}', [
        'as' => 'product.destroy ',
        'uses' => 'ProductController@destroy',
        'middleware' => 'can:product_delete'
    ]);
    Route::get('getprdtype', 'ProductController@getPrdType');
});
