<?php

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
        $regions = Region::where("city_id",$request->city_id)
                    ->lists("name","id");
        return response()->json($regions);
    }
   

}