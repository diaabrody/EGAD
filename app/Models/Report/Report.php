<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report\Traits\Relationship\ReportRelationship;
use App\Models\Report\Traits\Attribute\ReportAttribute;

class Report extends Model
{
    use ReportRelationship;
    use ReportAttribute;


    protected $fillable = [
        'user_id',
        'child_id',
        'reporter_phone_number',
        'type',
    ];


}
