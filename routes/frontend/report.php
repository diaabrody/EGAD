<?php
Route::group(['namespace' => 'Report', 'as' => 'report.'], function () {

Route::get('/reports', 'ReportsController@index');
Route::get('reports/{id}','ReportsController@show');
Route::get("/report/create/{status}",'ReportsController@create');
Route::post("/report/save/" , "ReportsController@store");

});