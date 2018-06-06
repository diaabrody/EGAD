<?php

namespace App\Repositories\Frontend\Report;

use Carbon\Carbon;
use App\Models\Report\Report;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


/**
 * Class ReportRepository.
 */
class ReportRepository extends BaseRepository
{
    public function model()
    {
        return Report::class;
    }
    
    public function retriveAll()
    {
         $reports=$this->model->all();
         return $reports;
    }
    public function retriveUser_reports()
    {
         $user= Auth::user(); 
         $reports=$this->model->Where('user_id','=',$user->id)->get();
         return $reports;
    }


    public function findByid($id)
    {
        $report =$this->model->find($id);

        if ($report instanceof $this->model) {
            return $report;
        }
        
    }

    public function selectByFaceID($face_id)
    {

        $report=$this->model->Where('face_id','=',$face_id)->get();
        
        return $report ;

    }






    // this function will use in store function in controller
//    public function create(array $data)
//    {
//
//        return DB::transaction(function () use ($data) {
//            $report = parent::create([
//
//                'name'   => $data['name'],
//                'age'  => $data['age'],
//                'gender'  => $data['gender'],
//                'special_sign'  => $data['special_sign'],
//                'photo'   => $data['photo'],
//                'lost_since'   => $data['lost_since'],
//                'reporter_phone_number'  => $data['reporter_phone_number'],
//                'user_id'   => $data['user_id'],
//                'type' => $data['type'],
//                'found_since' => $data['found_since']
//
//            ]);
//            return $report;
//        });
//    }
















}