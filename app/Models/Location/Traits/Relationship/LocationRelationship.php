<?php

namespace App\Models\Location\Traits\Relationship;

use  App\Models\Report\Report;


trait LocationRelationship
{

    public function report()
    {
        return $this->hasMany(Report::class);
    }

}

?>