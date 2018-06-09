<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Helpers\Auth\Auth;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\UrgentRegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use App\Repositories\Frontend\Auth\UserRepository;


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

        event(new Registered( $user = $this->userRepository->urgentcreate($request->only('phone_no'))));

        $this->guard()->login($user);
       
        return redirect('/report/create/quick')->withFlashSuccess(
                __('Your email is guest@ejad.com and password is 123456 and you can change them in the next time you login to your profile') 
        );

    }
    

  
    
}
