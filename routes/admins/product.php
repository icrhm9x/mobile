<?php
Route::prefix('product')->group(function () {
    Route::get('', [
        'as' => 'product.index',
        'uses' => 'ProductController@index'
    ]);
    Route::get('create', [
        'as' => 'product.create',
        'uses' => 'ProductController@create'
    ]);
    Route::post('', [
        'as' => 'product.store',
        'uses' => 'ProductController@store'
    ]);
    Route::get('{product}/edit', [
        'as' => 'product.edit',
        'uses' => 'ProductController@edit'
    ]);
    Route::put('{product}', [
        'as' => 'product.update',
        'uses' => 'ProductController@update'
    ]);
    Route::delete('{product}', [
        'as' => 'product.destroy ',
        'uses' => 'ProductController@destroy'
    ]);
});
