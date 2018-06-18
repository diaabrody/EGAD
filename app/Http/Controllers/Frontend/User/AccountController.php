<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Report\ReportRepository;
use App\Models\City\City;
use App\Models\Region\Region;

/**
 * Class AccountController.
 */
class AccountController extends Controller
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
        return view('frontend.user.account.tabs.profile');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $cities = City::all();
        $regions = Region::all();

        return view('frontend.user.account.tabs.edit', [
            'cities' => $cities,
            'regions' => $regions,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPassword()
    {
        return view('frontend.user.account.tabs.change-password');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myReports()
    {
        $reports = $this->reportRepository->retriveUser_reports();
        return view('frontend.user.account.tabs.myreports', [
            'reports' => $reports
        ]);
    }

    public function profile()
    {
        $cities = City::all();
        $regions = Region::all();
        $reports = $this->reportRepository->retriveUser_reports();

        return view('frontend.user.account.myAccount', [

            'cities' => $cities,
            'regions' => $regions,
            'reports' => $reports
        ]);

    }
}
