<?php
Route::prefix('member')->group(function () {
    Route::get('', [
        'as' => 'member.index',
        'uses' => 'MemberController@index'
    ]);
    Route::get('create', [
        'as' => 'member.create',
        'uses' => 'MemberController@create'
    ]);
    Route::post('', [
        'as' => 'member.store',
        'uses' => 'MemberController@store'
    ]);
    Route::get('{member}/edit', [
        'as' => 'member.edit',
        'uses' => 'MemberController@edit'
    ]);
    Route::put('{member}', [
        'as' => 'member.update',
        'uses' => 'MemberController@update'
    ]);
    Route::delete('{member}', [
        'as' => 'member.destroy ',
        'uses' => 'MemberController@destroy'
    ]);
});
