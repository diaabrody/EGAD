<?php

namespace App\Models\Notification\Traits\Relationship;

use  App\Models\Auth\User;
use  App\Models\Comment\Comment;
use  App\Models\Notification\Notification;

trait NotificationRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class,'comment_id');
    }

    
    
}
