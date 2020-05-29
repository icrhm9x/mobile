<?php
Route::prefix('permission')->group(function () {
    Route::get('', [
        'as' => 'permission.index',
        'uses' => 'PermissionController@index',
        'middleware' => 'can:permission_list'
    ]);
    Route::get('create', [
        'as' => 'permission.create',
        'uses' => 'PermissionController@create',
        'middleware' => 'can:permission_add'
    ]);
    Route::post('', [
        'as' => 'permission.store',
        'uses' => 'PermissionController@store'
    ]);
    Route::get('{permission}/edit', [
        'as' => 'permission.edit',
        'uses' => 'PermissionController@edit',
        'middleware' => 'can:permission_edit'
    ]);
    Route::put('{permission}', [
       'as' => 'permission.update',
       'uses' => 'PermissionController@update'
    ]);
    Route::get('delete/{permission}', [
        'as' => 'permission.destroy',
        'uses' => 'PermissionController@destroy',
        'middleware' => 'can:permission_delete'
    ]);
});
