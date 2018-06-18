<?php

namespace App\Repositories\API;

use Carbon\Carbon;
use App\Models\Auth\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class RegisterRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function create(array $data) : User
    {


        return DB::transaction(function () use ($data) {
            
            $User = parent::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_no' => $data['phone_no'],
                'password' => bcrypt($data['password']),
            ]);

            return $User;
        });

       
    }

}