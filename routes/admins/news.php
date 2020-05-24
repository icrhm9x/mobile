<?php
Route::prefix('news')->group(function () {
    Route::get('', [
        'as' => 'news.index',
        'uses' => 'NewsController@index'
    ]);
    Route::get('create', [
        'as' => 'news.create',
        'uses' => 'NewsController@create'
    ]);
    Route::post('', [
        'as' => 'news.store',
        'uses' => 'NewsController@store'
    ]);
    Route::get('{news}/edit', [
        'as' => 'news.edit',
        'uses' => 'NewsController@edit'
    ]);
    Route::put('{news}', [
        'as' => 'news.update',
        'uses' => 'NewsController@update'
    ]);
    Route::delete('{news}', [
        'as' => 'news.destroy ',
        'uses' => 'NewsController@destroy'
    ]);
});
