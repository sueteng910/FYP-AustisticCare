<?php

namespace AutisticCare\Http\Controllers\Auth;

use AutisticCare\User;
use AutisticCare\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/therapist/home';

    protected function redirectTo( ) {
        if (Auth::check() && Auth::user()->role == 'therapist' ) {
            if(Auth::user()->validated == '1')  {
                return '/therapist/home';

                }
            else{            
                return '/therapist/validation';


             }

            }
        else if (Auth::check() && Auth::user()->role == 'mother' )  {
            if ( Auth::user()->validated == '1')    {
                return '/mother/home';

            }
            else{
                return '/mother/validation';

            }

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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \AutisticCare\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=> $data['role'],
            'password' => Hash::make($data['password']),
          'phone'=> $data['phone'],
        ]);
    }

    public function showRole()  {
        return view ('auth/showRole');
    }
}
