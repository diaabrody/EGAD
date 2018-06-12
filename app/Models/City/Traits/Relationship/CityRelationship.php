<?php

namespace App\Models\City\Traits\Relationship;

use  App\Models\Region\Region;
use  App\Models\Notification\Notification;

trait CityRelationship
{
    public function regions()
    {
        return $this->hasMany(Region::class);
    }

   
  
}
