<?php

Route::group(['namespace' => 'Comment', 'as' => 'comment.', 'prefix'=>'laravellikecomment'], function (){
	Route::group(['middleware' => 'auth'], function (){
		Route::get('/like/vote', 'LikeController@vote');
        Route::get('/comment/store', 'CommentsController@add');
        //Route::get('/test', 'CommentsController@hh');

	});
});