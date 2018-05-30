<?php

namespace App\Models\Report\Traits\Relationship;

use  App\Models\Auth\User;
use  App\Models\Child\Child;
use  App\Models\Comment\Comment;

trait ReportRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function child()
    {
        return $this->belongsTo(Child::class,'child_id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
