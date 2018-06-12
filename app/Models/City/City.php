<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityRelationship;



class City extends Model
{
    use CityRelationship;

    protected $fillable = [
        'name',
    ];


}
