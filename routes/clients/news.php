<?php
Route::get('tin-tuc', 'NewsController@show')->name('get.list.news');
Route::get('tin-tuc/{n_slug}', 'NewsController@detail')->name('get.detail.news');
