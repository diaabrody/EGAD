<?php

namespace App\Models\Report\Traits\Relationship;

use  App\Models\Auth\User;



trait ReportRelationship
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
   
}
