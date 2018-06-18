<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\API\RegisterRepository;
use App\Models\Auth\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class RegisterController extends Controller
{
    protected $registerRepository;

    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required',
            'phone_no'=> 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = $this->registerRepository->create($request->only(
            'name',
            'email',
            'password',
            'phone_no'
        ));
        //dd($user);
        $token = JWTAuth::fromUser($user);
        
        return Response::json(compact('token'));
    }
}