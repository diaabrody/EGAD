<?php

namespace App\Http\Controllers\Frontend;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class MapController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Cornford\Googlmapper\Facades\MapperException
     */
    public function index(Request $request){
        $search = $request->search ? $request->search : 'Egypt';
        $locations = Location::all();
        Mapper::location($search)->map( [ 'clusters' => ['size' => 10, 'center' => true , 'zoom' => 20 ] ,  'marker' => true ]);

        foreach($locations as $location)
        {
            Mapper::marker($location->location->getLat(), $location->location->getLng(), ['symbol' => 'circle', 'scale' => 1000]);

        }


        return view('frontend.maps.map');
    }


    public function create(Request $request)
    {
        $marker =  $request->marker;

        $lat =  Mapper::location($marker)->getLatitude();
        $lng = Mapper::location($marker)->getLongitude();

        $place = new Location();

        $place->name = $request->marker;
        $place->report_id = 1;

        $place->location = new Point($lat, $lng);	// (lat, lng)

        $place->save();


        return redirect('/map');

    }


}
