<?php
Route::prefix('category')->group(function () {
    Route::get('', [
        'as' => 'category.index',
        'uses' => 'CategoryController@index'
    ]);
    Route::post('', [
        'as' => 'category.store',
        'uses' => 'CategoryController@store'
    ]);
    Route::get('{category}', [
        'as' => 'category.show',
        'uses' => 'CategoryController@show'
    ]);
    Route::get('{category}/edit', [
        'as' => 'category.edit',
        'uses' => 'CategoryController@edit'
    ]);
    Route::put('{category}', [
        'as' => 'category.update',
        'uses' => 'CategoryController@update'
    ]);
    Route::delete('{category}', [
        'as' => 'category.destroy ',
        'uses' => 'CategoryController@destroy'
    ]);
});
