<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Report\Report;
use Illuminate\Support\Facades\DB;

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
        $youngerThanOneYear=Report::whereBetween('age', [0, 1])->count();
        $from1To5=Report::whereBetween('age', [1, 5])->count();
        $from6To10=Report::whereBetween('age', [6, 10])->count();
        $from11To20=Report::whereBetween('age', [11, 20])->count();
        $biggerThanTwentyYear=Report::where('age','>',20)->count();

        $lostPerYear=DB::table('reports')
        ->select(DB::raw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(id) as id'))
        ->groupBy(DB::raw('MONTH(created_at) ASC, YEAR(created_at) ASC'))->get()->toArray();



        return view('backend.dashboard',['lostPerYear'=>$lostPerYear,'male' => $maleCount,'female' => $femaleCount,'youngerThanOneYear'=>$youngerThanOneYear,'from1To5'=>$from1To5,'from6To10'=>$from6To10,'from11To20'=>$from11To20,'biggerThanTwentyYear'=>$biggerThanTwentyYear]);
    }
}
