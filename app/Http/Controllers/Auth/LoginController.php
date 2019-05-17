<?php

namespace AutisticCare\Http\Controllers\Auth;

use AutisticCare\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo( ) {
        if (Auth::check() && Auth::user()->role == 'therapist' && Auth::user()->validated == '1') {
            return '/therapist/home';
        }
        else if (Auth::check() && Auth::user()->role == 'therapist' && Auth::user()->validated == '0')  {
            return '/therapist/validation';
        }
        else if (Auth::check() && Auth::user()->role == 'mother' && Auth::user()->validated == '1')  {
            return '/mother/home';

        }
        else if(Auth::check() && Auth::user()->role == 'mother' && Auth::user()->validated == '0')   {
            return '/mother/validation';
        }
        else {
            return '/admin/home';
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
