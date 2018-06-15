<?php
Route::group(['namespace' => 'Child', 'as' => 'child.'], function () {

Route::get('/children', 'ChildController@index');


});
