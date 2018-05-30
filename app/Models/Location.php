<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Location extends Model
{

    use SpatialTrait;

    protected $fillable = [
        'report_id',
        'name',
    ];

    protected $spatialFields = [
        'location',
    ];
}
