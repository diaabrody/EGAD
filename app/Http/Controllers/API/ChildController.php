<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\API\ChildRepository;
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

