<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Report\ReportRepository;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;
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


        return view('frontend.index');
    }
}
