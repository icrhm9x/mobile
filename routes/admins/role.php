<?php
Route::prefix('role')->group(function () {
    Route::get('', [
        'as' => 'role.index',
        'uses' => 'RoleController@index'
    ]);
    Route::get('create', [
        'as' => 'role.create',
        'uses' => 'RoleController@create'
    ]);
    Route::post('', [
        'as' => 'role.store',
        'uses' => 'RoleController@store'
    ]);
//    Route::get('{role}/edit', [
//        'as' => 'role.edit',
//        'uses' => 'RoleController@edit'
//    ]);
//    Route::put('{role}', [
//        'as' => 'role.update',
//        'uses' => 'RoleController@update'
//    ]);
//    Route::delete('{role}', [
//        'as' => 'role.destroy ',
//        'uses' => 'RoleController@destroy'
//    ]);
});
