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

    public function findByid($id)
    {
        $report =$this->model->find($id);

        if ($report instanceof $this->model) {
            return $report;
        }
        
    }


    // this function will use in store function in controller
    public function create(array $data)
    {

        return DB::transaction(function () use ($data) {
            $report = parent::create([
                 'user_id'   => $data['user_id'],
                'child_id'  => $data['child_id'],
              //  'location_id'  => $data['location_id'],
                'reporter_phone_number'   => $data['reporter_phone_number'],
            ]);
            return $report;
        });
    }















}