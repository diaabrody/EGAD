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
class ReportRepository extends BaseRepository
{
    public function model()
    {
        return Child::class;
    }



}