<?php

Route::get('map', 'MapController@index')->name('view.map');
Route::post('map/addmarker', 'MapController@create')->name('add.map.marker');
