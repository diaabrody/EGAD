<?php

namespace App\Models\Child;

use Illuminate\Database\Eloquent\Model;
use App\Models\Child\Traits\Relationship\ChildRelationship;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Child extends Model
{
    use ChildRelationship,
        SpatialTrait;

    protected $table = 'children';

    protected $fillable = [
        'name',
        'age',
        'gender',
        'photo',
        'special_sign',
        'height',
        'weight',
        'eye_color',
        'hair_color',
        'lost_since',
        'found_since',
        'last_seen_on'
    ];
    protected $spatialFields = [
        'last_seen_at'
    ];

}
