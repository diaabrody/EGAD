<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Report\ReportRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    protected $reportRepository;


    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reports=$this->reportRepository->retriveUser_reports();
        return view('frontend.user.dashboard',[
            'reports' => $reports
        ]);
    }
   
}
