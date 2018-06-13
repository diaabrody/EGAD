<?php

namespace App\Http\Controllers\Frontend;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Report\ReportRepository;
use Cornford\Googlmapper\Exceptions\MapperSearchResultException;
use Nexmo\Laravel\Facade\Nexmo;



class MapController extends Controller
{

    protected $reportRepository;


    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Cornford\Googlmapper\Facades\MapperException
     */
    public function index(Request $request)
    {
        $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));

        $loc = geoip()->getLocation($ip);


        $search = $request->search ? $request->search : $loc->city;
        $locations = $this->reportRepository->all();

        Mapper::location($search)->map(['clusters' => ['size' => 10, 'center' => true, 'zoom' => 20], 'marker' => true]);

        foreach ($locations as $location) {
            Mapper::marker($location->location->getLat(), $location->location->getLng(), ['symbol' => 'circle', 'scale' => 1000]);

        }


        return view('frontend.maps.map');
    }


    public function store(Request $request)
    {
        $marker = $request->marker;

        /** @var Point $lat */
        /** @var Point $lng */
        try {
            $lat = Mapper::location($marker)->getLatitude();
            $lng = Mapper::location($marker)->getLongitude();
        } catch (MapperSearchResultException $exception) {
            return redirect('map')->with('message', $exception->getMessage());
        }

        $data = [
            'user_id' => auth()->user()->id,
            'last_seen_at' => $request->marker,
            'location' => new Point($lat, $lng),
            'reporter_phone_number'=> 1200000000,
            'type'=> 'Urgent'
        ];

        $this->reportRepository->create($data);

        return redirect('map')->with('message', 'Marker Dropped Successfully');

    }

    public function sms()
    {
       $nex =   Nexmo::message()->send([
            'to'   => '201225365069',
            'from' => 'EJAD',
            'text' => 'Hello and Welcome to Ejad platform'
        ]);

       dd($nex);
    }


}
