<?php
Route::group(['namespace' => 'Comment', 'as' => 'comment.'], function () {

Route::post('/reports/comment/{id}', 'CommentsController@create');

});