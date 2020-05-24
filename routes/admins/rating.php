<?php
Route::get('rating', [
    'as' => 'rating.index',
    'uses' => 'RatingController@index'
]);
