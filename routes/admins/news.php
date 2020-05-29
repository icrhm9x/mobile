<?php
Route::prefix('news')->group(function () {
    Route::get('', [
        'as' => 'news.index',
        'uses' => 'NewsController@index',
        'middleware' => 'can:news_list'
    ]);
    Route::get('create', [
        'as' => 'news.create',
        'uses' => 'NewsController@create',
        'middleware' => 'can:news_add'
    ]);
    Route::post('', [
        'as' => 'news.store',
        'uses' => 'NewsController@store'
    ]);
    Route::get('{news}/edit', [
        'as' => 'news.edit',
        'uses' => 'NewsController@edit',
        'middleware' => 'can:news_edit'
    ]);
    Route::put('{news}', [
        'as' => 'news.update',
        'uses' => 'NewsController@update'
    ]);
    Route::delete('{news}', [
        'as' => 'news.destroy ',
        'uses' => 'NewsController@destroy',
        'middleware' => 'can:news_delete'
    ]);
});
