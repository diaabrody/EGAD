<?php


Route::group([
    'as'         => 'report.',
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {

       // Route::resource('reports', 'ReportController');
       Route::get('/reports', 'Report\ReportController@index');

    });
});

