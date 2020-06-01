<?php

Route::post('danh-gia/{id}', 'RatingController@saveRating')->middleware('CheckLoginUser')->name('post.rating');

Route::get('tim-kiem', 'SearchController@list')->name('get.list.search');
Route::get('{c_slug}', 'CategoryController@list')->name('get.category');

Route::get('{c_slug}/{prdType_slug}', 'ProductTypeController@list')->name('get.list.productType');

Route::get('{c_slug}/{prdType_slug}/{prd_slug}', 'ProductController@detail')->name('get.detail.product');
