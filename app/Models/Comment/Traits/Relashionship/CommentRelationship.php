<?php

namespace App\Models\Comment\Traits\Relationship;

use  App\Models\Auth\User;
use  App\Models\Report\Report;

trait CommentRelationship
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
