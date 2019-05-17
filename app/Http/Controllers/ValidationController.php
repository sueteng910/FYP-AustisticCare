<?php

namespace AutisticCare\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use AutisticCare\Children;
use AutisticCare\User;

use Auth;
use Validator;


class ValidationController extends Controller
{
    //
    public function motherValidation(Request $request, $id = null)  {
        $validator = Validator::make($request->all(),[
            'birthday' => 'required',
            'myKID' => 'required',
            
           
        ]);
    
        $check = Children::where('myKID', $request['myKID'])->first();
        $birthday1 = $request['birthday'];
        $check_date = $check->birthday;
        if ($check = Children::where('myKID', $request['myKID'])->first())   {
            $check->mother_id = Auth::user()->id;
            $check->save();
            $validation = User::find(Auth::user()->id);
            $validation->validated = '1';
            $validation->save();
            return Redirect::to('/mother/home');
          
        }

        else    {
            \Session::flash('warning', 'Please enter the valid details');
            return Redirect::to('/mother/validation')->withInput()->withErrors($validator);
        }
    }
    public function motherSuccess   ()  {
        return view ('/mother/successful');
    }
    
    public function theraValidation(Request $request, $id= null)   {
        $validator = Validator::make($request->all(),[
            'profile_pic' => 'required',
            'ic_pic' => 'required',
            
           
        ]);
        $user = User::find(Auth::user()->id);
        $user_id = Auth::user()->id;
        $profile_pic = $request['profile_pic'];
        $extension = $profile_pic->getClientOriginalExtension();
        $profile_pic_name = $user_id.'.'.$extension;
        $profile_pic->move('images/thera/profile_pic',$profile_pic_name);

        $ic_pic = $request['ic_pic'];
        $extension = $ic_pic->getClientOriginalExtension();
        $ic_pic_name = $user_id.'.'.$extension;
        $ic_pic->move('images/thera/ic_pic',$ic_pic_name);

        $user->ic_pic = $ic_pic_name;
        $user->profile_pic = $profile_pic_name;
        $user->save();
        Auth::logout();

       

        return Redirect::to('/therapist/successful');

    
    }
}
