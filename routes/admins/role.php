<?php
Route::prefix('role')->group(function () {
    Route::get('', [
        'as' => 'role.index',
        'uses' => 'RoleController@index',
        'middleware' => 'can:role_list'
    ]);
    Route::get('create', [
        'as' => 'role.create',
        'uses' => 'RoleController@create',
        'middleware' => 'can:role_add'
    ]);
    Route::post('', [
        'as' => 'role.store',
        'uses' => 'RoleController@store'
    ]);
    Route::get('{role}/edit', [
        'as' => 'role.edit',
        'uses' => 'RoleController@edit',
        'middleware' => 'can:role_edit'
    ]);
    Route::put('{role}', [
        'as' => 'role.update',
        'uses' => 'RoleController@update'
    ]);
    Route::get('delete/{role}', [
        'as' => 'role.destroy',
        'uses' => 'RoleController@destroy',
        'middleware' => 'can:role_delete'
    ]);
});
