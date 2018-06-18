<?php

namespace App\Models\Report\Traits\Relationship;

use  App\Models\Auth\User;
use  App\Models\Child\Child;


trait ReportRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
   
}
