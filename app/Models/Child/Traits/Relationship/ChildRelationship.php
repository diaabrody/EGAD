<?php

namespace App\Models\Child\Traits\Relationship;

use  App\Models\Report\Report;

trait ChildRelationship
{
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
