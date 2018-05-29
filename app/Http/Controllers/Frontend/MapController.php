<?php

namespace App\Http\Controllers\Frontend;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Cornford\Googlmapper\Facades\MapperException
     */
    public function index(){
        Mapper::map(26.8206, 30.8025)->marker(26.381128999999990000, 30.470085000000040000, ['markers' => [ 'draggable' => true ,'symbol' => 'circle', 'scale' => 1000, 'animation' => 'DROP']]);
        return view('frontend.maps.map');
    }
}
