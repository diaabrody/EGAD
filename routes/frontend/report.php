<?php
Route::group(['namespace' => 'Report', 'as' => 'report.'], function () {

Route::get('/reports', 'ReportsController@index');
Route::get('reports/{id}','ReportsController@show')->name('show')->middleware('auth');
Route::get("/reports/create/{status}",'ReportsController@create')->middleware('auth');
Route::post("/reports" , "ReportsController@store");
Route::get("/reports/{id}/edit" , "ReportsController@edit")->middleware('auth');
Route::put("/reports/{id}" , "ReportsController@update");
Route::get("/report/children/found" , "ReportsController@childFound")->name('founded')->middleware('auth');
Route::get("/report/children/search" , "ReportsController@getsearchpage")->middleware('auth');
Route::post("/report/children/searchfound" , "ReportsController@search");




});
