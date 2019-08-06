<?php

namespace AutisticCare\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use AutisticCare\Children;
use AutisticCare\TherapyReport;
use AutisticCare\TherapyTypes;

use AutisticCare\User;
use AutisticCare\Goal;
use AutisticCare\Aspect;
use Illuminate\Support\Facades\Redirect;


use Validator;




class PagesController extends Controller
{
    //
    public function index() {
        
        
        return view('/auth/login');
    }

    public function therahome() {
        $id = auth()->user()->id;
        $childrens = Children::where('therapist_id', $id )->get();
        $female = Children::where('therapist_id', $id )->where('gender', 'female')->count();
        $male = Children::where('therapist_id', $id )->where('gender', 'male')->count();
       // $month = 
        //$childrens->created_at->month

        $report_count = TherapyReport::where('therapist_id', $id)->where('mark_as_done', '0')->count();
        //$now = Carbon::now();
        

        return view('/therapist/home')->with(compact('childrens'))->with(compact('report_count'))
        ->with(compact('female',json_encode($female,JSON_NUMERIC_CHECK)))
        ->with(compact('male',json_encode($male,JSON_NUMERIC_CHECK)));
    }

    public function adminhome() {
        $childrens = Children::all();
        $therapist = User::where('role','therapist')->where('validated', '1');
        $female = Children::where('gender', 'female')->count();
        $male = Children::where('gender', 'male')->count();
        return view ('/admin/home')->with(compact('childrens'))->with(compact('therapist'))
        ->with(compact('female',json_encode($female,JSON_NUMERIC_CHECK)))
        ->with(compact('male',json_encode($male,JSON_NUMERIC_CHECK)));
    }
    public function theracalendar() {
        return view ('/therapist/calendar');
    }

    public function therachildren() {
        $id = auth()->user()->id;
        $childrens = Children::where('therapist_id', $id )->get();
        return view ('/therapist/children')->with(compact('childrens'));
    }

    public function profile($id)   {

        //chart
       
        $therapy_type = DB::table('therapy_types')->pluck('name');


        //Profile info
        $childrens = Children::where('id', $id )->with('mother')->first();
        $goal_count = Goal::where('children_id', $id)->where('complete', '0')->count();
        $category = DB::table('aspects')->get();
        $goal = Goal::where('children_id', $id)->where('complete', '0')->orderBy('created_at')->get();

        $loop = 1;
        //2d array
        $count_arr = [];
        $loop_1 = 0;
        $thera_0=[];
        $thera_1=[];
        $thera_2=[];
        
        foreach ($goal as $goals)    { 
            $loop_2 = 0;
            foreach($therapy_type as $therapy_types)    {
                $count_arr[$loop_1][$loop_2]= TherapyReport::where('therapy_name', $therapy_types)
                ->where('goal', $goals->id)->where('mark_as_done', '1')->count();
                //$count_arr= array_add($count_arr, 'count', $therapy_types);
                $thera_get = TherapyReport::where('therapy_name', $therapy_types)
                ->where('goal', $goals->id)->where('mark_as_done', '1')->get();
                
                for ($i = 1; $i<=12; $i++ ){
                    $add = 1;
                    $total_rating = 0;
                    foreach($thera_get as $thera_gets) {
                        $check_month = $thera_gets->date->month;
                        if ($check_month == $i)   { 
                            $rating = $thera_gets->rating;
                            if ($add == 1)  {
                                $total_rating = $rating;
                                $add = $add + 1;
                            } 
                            else {
                                                 
                                $total_rating = $total_rating + $rating;
                                $add = $add + 1;
                            }                           
                        }
                    }
                    $new_add = $add -1;
                    if($new_add != 0)   {
                    $total_rating = $total_rating/($add-1);
                }
                    ${'thera_'.$loop_1}[$loop_2][$i] = $total_rating;
                    
                }
                $loop_2 = $loop_2 +1;
            }
            $loop_1 = $loop_1 +1;
        }

        //line chart
       

       // $progress = TherapyReport::where();
        return view ('/therapist/children/profile')->with(compact('childrens'))->with(compact('goal_count'))
        ->with(compact('category'))->with(compact('goal'))->with(compact('add'))->with(compact('loop_1'))->with(compact('count_arr',json_encode($count_arr,JSON_NUMERIC_CHECK)))
        ->with(compact('thera_0',json_encode($thera_0,JSON_NUMERIC_CHECK)))
        ->with(compact('thera_1',json_encode($thera_1,JSON_NUMERIC_CHECK)))
        ->with(compact('thera_2',json_encode($thera_2,JSON_NUMERIC_CHECK)))
        ;
    }

    public function addGoal(Request $request, $id=null)   {
        $validator = Validator::make($request->all(),[
            'goal' => 'required',
            'category' => 'required',
            
          

        ]);

        if ($validator-> fails())   {
            \Session::flash('warnning', 'Please enter the valid details');
            return Redirect::back();
        }

        else    {

        $goal = new Goal;
        $goal->title = $request['goal'];
        $goal->category = $request['category'];
        $goal->children_id = $request['children_id'];
        $goal->complete = '0';
        $goal->save();

        $id = $request['children_id'];



        \Session::flash('success', 'Goal added successfully');
        return Redirect::back();

    }
}


public function validation()    {
    return view('/therapist/validation');
}
public function motherValidation()  {
    return view('/mother/validation');
}
public function successful()    {
    return view('/therapist/successful');
}

}
