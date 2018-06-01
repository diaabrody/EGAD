<?php
Route::group(['namespace' => 'Report', 'as' => 'report.'], function () {

Route::get('/reports', 'ReportsController@index');
Route::get('reports/{id}','ReportsController@show');
Route::post('/reports/comment/{id}', 'ReportsController@comment');
Route::get("/report/create",'ReportsController@create');

});