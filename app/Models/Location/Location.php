<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use App\Models\Location\Traits\Relationship\LocationRelationship;
class Location extends Model
{

    use SpatialTrait, LocationRelationship;

    protected $fillable = [
        'report_id',
        'name',
        'location',
    ];

    protected $spatialFields = [
        'location',
    ];
}
