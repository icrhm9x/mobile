<?php
Route::prefix('permission')->group(function () {
    Route::get('', [
        'as' => 'permission.index',
        'uses' => 'PermissionController@index'
    ]);
    Route::get('create', [
        'as' => 'permission.create',
        'uses' => 'PermissionController@create'
    ]);
    Route::post('', [
        'as' => 'permission.store',
        'uses' => 'PermissionController@store'
    ]);
    Route::get('{permission}/edit', [
        'as' => 'permission.edit',
        'uses' => 'PermissionController@edit'
    ]);
    Route::put('{permission}', [
       'as' => 'permission.update',
       'uses' => 'PermissionController@update'
    ]);
    Route::get('delete/{permission}', [
        'as' => 'permission.destroy',
        'uses' => 'PermissionController@destroy'
    ]);
});
