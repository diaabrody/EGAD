<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use App\Models\Report\Traits\Relationship\ReportRelationship;
use App\Models\Report\Traits\Attribute\ReportAttribute;

class Report extends Model
{
    use ReportRelationship;
    use ReportAttribute;
    use SpatialTrait;

    protected $fillable = [
        'user_id',
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
        'last_seen_on',
        'last_seen_at',        
        'is_found',
        'reporter_phone_number',
        'type',
    ];

    protected $spatialFields = [
        'last_seen_at',        
    ];


}
