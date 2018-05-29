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
    public function index(Request $request){
//        dd($request->search);
        $search = $request->search ? $request->search : 'Alexandria';
        Mapper::location($search)->map( [ 'zoom' => 15 ,  'marker' => true ]);

        return view('frontend.maps.map');
    }
}
