<?php
Route::get('dang-ky', 'AuthController@getRegister')->name('get.register');
Route::post('dang-ky', 'AuthController@postRegister')->name('post.register');

Route::get('dang-nhap', 'AuthController@getLogin')->name('get.login');
Route::post('dang-nhap', 'AuthController@postLogin')->name('post.login');

Route::get('quen-mat-khau', 'AuthController@getForgotPassword')->name('get.forgot.password');
Route::post('quen-mat-khau', 'AuthController@codeForgotPassword')->name('code.forgot.password');

Route::get('doi-mat-khau', 'AuthController@getResetPassword')->name('get.reset.password');
Route::post('doi-mat-khau', 'AuthController@postResetPassword');

Route::get('dang-xuat', 'AuthController@getLogout')->name('get.logout');
