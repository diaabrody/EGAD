<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Report\ReportRepository;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Twitter;
use Cornford\Googlmapper\Exceptions\MapperSearchResultException;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{


    protected $reportRepository;


    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Cornford\Googlmapper\Facades\MapperException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index(Request $request)
    {
        $tweets1 = Twitter::getSearch(['q' => 'اطفال_مفقودة#', 'count' => '100', 'format' => 'array']);
        $tweets2 = Twitter::getSearch(['q' => 'اطفال_مخطوفة#', 'count' => '100', 'format' => 'array']);
        $tweets3 = Twitter::getSearch(['q' => 'ايجاد#', 'count' => '100', 'format' => 'array']);        
        $reports=$this->reportRepository->retriveNear();
       
        $loc = geoip()->getLocation($request->getClientIp());


        $search = $request->search ? $request->search : "Alexandria";
        $locations = $this->reportRepository->all();

        Mapper::location($search)->map(['cluster'=> true, 'marker' => true]);

        foreach ($locations as $location) {
            Mapper::marker($location->location->getLat(), $location->location->getLng(),
                [
                    'symbol' => 'circle',
                    'scale' => 1000,
                    'animation'=>'DROP',
                    'eventClick'=>'window.location ="reports/' . $location->id . '"' ]);

        }
//        $client = new Client();
//
//
//          $apiRequest = $client->request('POST',
//              'https://api.clxcommunications.com/xms/v1/itiel12/batches',
//              [
//                  'headers' => ['Authorization' => 'Bearer 69ebcb008c3b4cfc8ad333ae8f2c01ed',
//                                 'Content-type' => "application/json",
//                  ],
//
//                      'json' => [  "from" => "12345",
//                                    "to" => [ "1200013895" ],
//                                    "body" => "Hi there! How are you?"
//                      ],
//              ]);
//          dd($apiRequest->getStatusCode());


        return view('frontend.index',[
            'reports' => $reports,
             'map' => Mapper::render(),
             'tweets1' => $tweets1,
            'tweets2' => $tweets2,
            'tweets3' => $tweets3,
            
        ]);
    }
}
