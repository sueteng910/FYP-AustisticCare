<?php

namespace AutisticCare\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use AutisticCare\Homework;


class HomeworkController extends Controller
{
    //

    public function show(Request $request, $id)  {
        $newid = $id;

        return view ('/therapist/children/homework')->with(compact('newid'));
    }

    public function update(Request $request, $id=null)   {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'due' => 'required',
            
            'step_1' =>'required',
            'step_2'=> 'required',

        ]);

        if ($validator-> fails())   {
            \Session::flash('warning', 'Please enter the valid details');
            return Redirect::to('/therapist/children/homeworkList')->withInput()->withErrors($validator);
        }

        else    {

        $event = new Homework;
        $event->title = $request['title'];
        $event->description = $request['description'];
        $event->due = $request['due'];
        $event->step_1 = $request['step_1'];
        $event->step_2 = $request['step_2'];
        $event->step_3 = $request['step_3'];
        $event->children_id = $request['newid'];
        $event->complete = 0;
       // $event->title = $request['title'];
        $event->save();

        \Session::flash('success', 'Appoinment added successfully');

        return Redirect::to('/therapist/children');


    }
       
}
public function showList($id)  {
        $therapist_id = Auth::user()->id;
        $id = $id;
        $done = Homework::where('complete', '1')
        ->where('children_id', $id)
        ->with('children')
        ->get();
        $undone = Homework::where('complete', '0')
        ->where('children_id', $id)
        ->with('children')

        ->get();
        
    return view('/therapist/children/homeworkList')->with(compact('done'))->with(compact('undone'))->with(compact('id'));;
}

public function display($id)   {
    $homework = Homework::where('id', $id)->first();
    $start_time = $homework->start_time;
    $end_time = $homework->end_time;
    //$time_taken = $end_time->diffInMinutes($start_time);

    return view('/therapist/children/homeworkReport')->with(compact('homework'));//->with(compact('time_taken'));
}
}
