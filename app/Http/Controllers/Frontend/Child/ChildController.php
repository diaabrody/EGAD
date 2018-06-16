<?php

namespace App\Http\Controllers\Frontend\Child;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Child\ChildRepository;
use Response;


class ChildController extends Controller
{

    protected $childRepository;






    public function __construct(ChildRepository $childRepository)
    {
        $this->childRepository = $childRepository;

    }

    public function index()
    {

        $children=$this->childRepository->retriveAll();
        return Response::json($children);

    }


}

