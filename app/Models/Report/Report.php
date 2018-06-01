<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report\Traits\Relationship\ReportRelationship;

class Report extends Model
{
    use ReportRelationship;


    protected $fillable = [
        'user_id',
        'child_id',
        'reporter_phone_number',
        'type',
        'location_id'
    ];


}
