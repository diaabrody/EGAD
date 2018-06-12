<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Helpers\Auth\Auth;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\UrgentRegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Frontend\Auth\UserRepository;
use Nexmo\Laravel\Facade\Nexmo;

/**
 * Class UrgentRegisterController.
 */
class UrgentRegisterController extends Controller
{
    use RegistersUsers;


    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UrgentRegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUrgentRegistrationForm()
    {
        return view('frontend.auth.urgentregister');
    }


    public function register(UrgentRegisterRequest $request){
        $password= str_random(8);

        event(new Registered( $user = $this->userRepository->urgentcreate($request->only('phone_no'),$password)));

        $this->guard()->login($user);
       
        Nexmo::message()->send([
            'to'   => '201225365069',
            'from' => 'EJAD',
            'text' => 'Hello and Welcome to Ejad website your password is '. $password .' and you can change it in the next time you login to your profile'
        ]);

        return redirect('/report/create/quick')->withFlashSuccess(
                __('you will receieve SMS contains your password and you can change it in the next time you login to your profile') 
        );

    }
    

  
    
}
