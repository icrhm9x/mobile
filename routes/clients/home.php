<?php
Route::get('', 'HomeController@index')->name('home');
Route::get('gioi-thieu', 'HomeController@about')->name('get.about');
Route::get('lien-he', 'HomeController@contact')->name('get.contact');
