<?php

Route::get('map', 'MapController@index')->name('view.map');
Route::post('map/addmarker', 'MapController@store')->name('add.map.marker');
