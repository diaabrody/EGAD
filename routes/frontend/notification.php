<?php
Route::group(['namespace' => 'Notification', 'as' => 'notification.'], function () {
    
Route::post('/notifications/edit', 'NotificationsController@update');

});