<?php

namespace App\Repositories\Frontend\Child;

use Carbon\Carbon;
use App\Models\Report\Report;
use App\Repositories\BaseRepository;


/**
 * Class ChildRepository.
 */

class ChildRepository extends BaseRepository
{
    public function model()
    {
        return Report::class;
    }
    
    public function retriveAll()
    {
         $children=$this->model->all();
         return $children;
    }














}