<?php

namespace AutisticCare\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use AutisticCare\Children;
use AutisticCare\TherapyReport;
use AutisticCare\TherapyTypes;
use AutisticCare\Homework;
use Carbon\Carbon;

use Validator;
use AutisticCare\Schedule;
use Calendar;
use AutisticCare\User;
use AutisticCare\Http\Controllers\Schedules;

use AutisticCare\Goal;
use AutisticCare\Aspect;
use Illuminate\Support\Facades\Redirect;
class MotherController extends Controller
{
    //
    public function motherhome()    {
        $therapy_type = DB::table('therapy_types')->pluck('name');
        $mother = Auth::user()->id;

        //Profile info
        $childrens = Children::where('mother_id', $mother )->with('mother')->first();
        $id = $childrens->id;
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
                
                //$count = 
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
       $homework_count = Homework::where('children_id', $id)->where('complete', '0')->count();

       // $progress = TherapyReport::where();
        return view ('/mother/home')->with(compact('childrens'))->with(compact('goal_count'))->with(compact('homework_count'))
        ->with(compact('category'))->with(compact('goal'))->with(compact('add'))->with(compact('loop_1'))->with(compact('count_arr',json_encode($count_arr,JSON_NUMERIC_CHECK)))
        ->with(compact('thera_0',json_encode($thera_0,JSON_NUMERIC_CHECK)))
        ->with(compact('thera_1',json_encode($thera_1,JSON_NUMERIC_CHECK)))
        ->with(compact('thera_2',json_encode($thera_2,JSON_NUMERIC_CHECK)))
        ;
        //return view('/mother/home');
    }

    public function calendar($id)  {
        $parent_id = Auth::user()->id;
        //$parent = User::where('id', $parent_id)->first();
        $child = Children::where('mother_id', $parent_id)->first();
        $newid = $child->id;
        $children = Children::where('id',$newid)->first();
        $goal = Goal::where('children_id',$newid)->where('complete','0')->get();
        $therapytypes = DB::table('therapy_types')->get();

        $events = [];
        $data = Schedule::where('children_id',$id)->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    false, //full day event?
                    new \DateTime($value->start_date.$value->start_time),
                    new \DateTime($value->end_date.$value->end_time),

                    $value->recurring, //reccuring
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
                        //'url' => 'pass here url and any route',
                        
	                ]
                );
            }
        }
        
        $calendar = Calendar::addEvents($events)
        ->setOptions([
            //'firstDay' => 1,
            //'plugins' => [ 'timeGrid' ],
           // 'timeZone'=> 'UTC',
            'defaultView' => 'agendaWeek',
            'selectable'=> true,


        ])
        ->setCallbacks([
            'eventClick' => 'function(event) {
                alert($newid);
                
            }',
           // 'viewRender' => 'function() {alert("Callbacks!");}',
            'select' => 'function() {
                alert();

                }',
                
        ]);
      

        //onclick add event
        



        return view('/mother/calendar')->with(compact('calendar'))->with(compact('newid'))
        ->with(compact('goal'))->with(compact('therapytypes'))->with(compact('children'));
    }

    public function homeworkList()  {
        $mother = Auth::user()->id;
        $child = Children::where('mother_id', $mother)->first();
        $child_id = $child->id;
        $data = Homework::where('children_id', $child_id)->where('complete', '0')->get();
        $newid = $child_id;
        return view('/mother/homeworkList')->with(compact('data'))->with(compact('newid'));
    }

    public function homework($id)  {

        $homework = Homework::where('id', $id)->first();
        $homework_id = $homework->id;
        $homework->start_time = Carbon::now();
        $homework->save();

        return view('/mother/homework')->with(compact('homework'))->with(compact('homework_id'));
    }
    public function submit(Request $request, $id = null)  {
        $validator = Validator::make($request->all(),[
            'review' => 'required',
           
        ]);

        if ($validator-> fails())   {
            \Session::flash('warning', 'Please enter the valid details');
            return Redirect::to('/mother/homework')->withInput()->withErrors($validator);
        }

        else    {

            $homework_id = $request['homework_id'];
            $homework = Homework::find($homework_id);
            $homework->review = $request['review'];
            $homework->end_time = Carbon::now();
            $homework->complete = '1';
            $homework->save();
        
            

        return Redirect::to('/mother/homeworkList');

    }
}
}

