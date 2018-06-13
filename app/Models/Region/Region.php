<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Model;
use App\Models\Region\Traits\Relationship\RegionRelationship;



class Region extends Model
{
    use RegionRelationship;

    protected $fillable = [
        'name',
        'city_id'
    ];


}
