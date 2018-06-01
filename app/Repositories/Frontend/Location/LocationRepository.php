<?php

namespace App\Repositories\Frontend\Location;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Location\Location;

class LocationRepository extends BaseRepository
{
    public function model()
    {
        return Location::class;
    }


}
