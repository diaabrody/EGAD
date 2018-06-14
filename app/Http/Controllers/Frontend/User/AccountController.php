<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use  App\Models\City\City;
use  App\Models\Region\Region;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cities = City::all();
        $regions = Region::all();
        return view('frontend.user.account',[
            'cities' => $cities,
            'regions' => $regions
        ]);
    }
}
