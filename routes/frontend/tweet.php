<?php
Route::group(['namespace' => 'Tweet', 'as' => 'tweet.'], function () {
Route::get('/tweets', 'TweetController@index');
});