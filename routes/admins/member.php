<?php
Route::prefix('member')->group(function () {
    Route::get('', [
        'as' => 'member.index',
        'uses' => 'MemberController@index',
        'middleware' => 'can:member_list'
    ]);
    Route::get('create', [
        'as' => 'member.create',
        'uses' => 'MemberController@create',
        'middleware' => 'can:member_add'
    ]);
    Route::post('', [
        'as' => 'member.store',
        'uses' => 'MemberController@store'
    ]);
    Route::get('{member}/edit', [
        'as' => 'member.edit',
        'uses' => 'MemberController@edit',
        'middleware' => 'can:member_edit'
    ]);
    Route::put('{member}', [
        'as' => 'member.update',
        'uses' => 'MemberController@update'
    ]);
    Route::delete('{member}', [
        'as' => 'member.destroy ',
        'uses' => 'MemberController@destroy',
        'middleware' => 'can:member_delete'
    ]);
});
