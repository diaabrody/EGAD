<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Report\Report;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $maleCount=Report::where('gender',0)->count();
        $femaleCount=Report::where('gender',1)->count();
        //dd($maleCount,$femaleCount);
        return view('backend.dashboard',['male' => $maleCount,'female' => $femaleCount]);
    }
}
