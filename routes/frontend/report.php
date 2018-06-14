<?php
Route::group(['namespace' => 'Report', 'as' => 'report.'], function () {

Route::get('/reports', 'ReportsController@index');
Route::get('reports/{id}','ReportsController@show')->name('show')->middleware('auth');
Route::get("/report/create/{status}",'ReportsController@create')->middleware('auth');
Route::post("/report/save/" , "ReportsController@store");
Route::get("/report/{id}/edit" , "ReportsController@edit")->middleware('auth');
Route::put("/report/update/{id}" , "ReportsController@update");
Route::get("/report/childs/found" , "ReportsController@childFound")->name('founded')->middleware('auth');
Route::get("/report/childs/search" , "ReportsController@getsearchpage")->middleware('auth');
Route::post("/report/childs/searchfound" , "ReportsController@search");




});
