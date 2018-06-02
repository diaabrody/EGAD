<?php

namespace App\Repositories\Backend\Report;

use App\Models\Auth\User;
use App\Models\Report\Report;
use App\Models\Child\Child;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Auth;

class ReportRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Report::class;
    }


    /**
     * @param array $data
     *
     * @return Report
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Report
    {
        
        return DB::transaction(function () use ($data) {
            $Report = parent::create([
                'user_id' => Auth::user()->id,
                'reporter_phone_number' => $data['reporter_phone_number'],
                'type' => $data['type'],
                'name' => $data['name'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'photo' =>Input::file('photo')->store('public/children'),
                'special_sign' => $data['special_sign'],
                'height' => $data['height'],
                'weight' => $data['weight'],
                'eye_color' => $data['eye_color'],
                'hair_color' => $data['hair_color'],
                'lost_since' => $data['lost_since'],
                'found_since' => $data['found_since'],
                'last_seen_at' => $data['last_seen_at'],
                'last_seen_on' => $data['last_seen_on'],
                'is_found' => $data['is_found']

            ]);

            


            return $Report;
        });

       
    }
}
