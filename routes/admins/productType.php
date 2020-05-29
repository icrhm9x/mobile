<?php
Route::prefix('productType')->group(function () {
    Route::get('', [
        'as' => 'productType.index',
        'uses' => 'ProductTypeController@index',
        'middleware' => 'can:productType_list'
    ]);
    Route::post('', [
        'as' => 'productType.store',
        'uses' => 'ProductTypeController@store',
        'middleware' => 'can:productType_add'
    ]);
    Route::get('{productType}', [
        'as' => 'productType.show',
        'uses' => 'ProductTypeController@show'
    ]);
    Route::get('{productType}/edit', [
        'as' => 'productType.edit',
        'uses' => 'ProductTypeController@edit',
        'middleware' => 'can:productType_edit'
    ]);
    Route::put('{productType}', [
        'as' => 'productType.update',
        'uses' => 'ProductTypeController@update'
    ]);
    Route::delete('{productType}', [
        'as' => 'productType.destroy ',
        'uses' => 'ProductTypeController@destroy',
        'middleware' => 'can:productType_delete'
    ]);
});
