<?php

namespace App\Models\Region\Traits\Relationship;

use  App\Models\City\City;

trait RegionRelationship
{
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

   
  
}
