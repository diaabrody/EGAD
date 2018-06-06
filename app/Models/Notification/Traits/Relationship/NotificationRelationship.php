<?php

namespace App\Models\Notification\Traits\Relationship;

use  App\Models\Auth\User;
use  App\Models\Report\Report;
use  App\Models\Notification\Notification;

trait NotificationRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class,'report_id');
    }
  
}
