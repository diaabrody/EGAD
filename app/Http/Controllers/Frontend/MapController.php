<?php

namespace App\Http\Controllers\Frontend;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Location\LocationRepository;

use App\Models\Location;

class MapController extends Controller
{

    protected $locationRepository;


    public function __construct(LocationRepository $location)
    {
        $this->locationRepository = $location;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Cornford\Googlmapper\Facades\MapperException
     */
    public function index(Request $request){

        $search = $request->search ? $request->search : 'Alexandria';
        $locations =  $this->locationRepository->all();

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


        $data = [
            'name' => $request->marker,
            'report_id' => 1,
            'location' => new Point($lat , $lng),
        ];

        $this->locationRepository->create($data);
//

        return redirect('/map');

    }


}
