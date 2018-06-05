<?php


Route::group([
    'namespace'=> 'Comment',
    'as'         => 'comment.',
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {

        Route::resource('comment', 'CommentController');
    });
});
