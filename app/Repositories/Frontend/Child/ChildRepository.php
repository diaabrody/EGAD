<?php

namespace App\Repositories\Frontend\Child;

use Carbon\Carbon;
use App\Models\Child\Child;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


/**
 * Class ChildRepository.
 */
    class ChildRepository extends BaseRepository
{
    public function model()
    {
        return Child::class;
    }


     // this function will use in store function in controller
        //store new record in database
        public function create(array $data)
        {

            return DB::transaction(function () use ($data) {
                $child = parent::create([
                    'name'   => $data['name'],
                    'age'  => $data['age'],
                    'gender'  => $data['gender'],
                    'special_sign'  => $data['special_sign'],
                    'photo'   => $data['photo'],

                ]);
                return $child;
            });
        }








    }