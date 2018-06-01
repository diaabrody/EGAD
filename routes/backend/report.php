<?php


Route::group([
    'namespace'=> 'Report',
    'as'         => 'report.',
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {

        Route::resource('report', 'ReportController');
    });
});

