<?php
Route::get('rating', [
    'as' => 'rating.index',
    'uses' => 'RatingController@index',
    'middleware' => 'can:rating_list'
]);
