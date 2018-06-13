<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region\Region;
use App\Models\City\City;

/**
 * Class AjaxController.
 */
class AjaxController extends Controller
{

    public function getRegionList(Request $request)
    {
        $regions = Region::where("city_id",$request->city_id)-> get();
               
        return response()->json($regions);
    }
   

}