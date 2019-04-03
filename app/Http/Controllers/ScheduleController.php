<?php

namespace AutisticCare\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Calendar;
use Validator;
use AutisticCare\Schedule;
use AutisticCare\Http\Controllers\Schedules;
use AutisticCare\Children;
use Auth;
use AutisticCare\TherapyReport;


class ScheduleController extends Controller
{
    //

    public function index(Request $request, $id)     {
        $newid = $id;

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
            'viewRender' => 'function() {alert("Callbacks!");}',
            'select' => 'function() {
                alert();

                }',
                
        ]);
      

        //onclick add event
        



        return view('/therapist/children/calendar')->with(compact('calendar'))->with(compact('newid'));
    }

    public function addEvent(Request $request, $id=null)  {
       
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'start_date' => 'required',
            
            'start_time' =>'required',
            'end_time'=> 'required',

        ]);

        if ($validator-> fails())   {
            \Session::flash('warning', 'Please enter the valid details');
            return Redirect::to('/therapist/children')->withInput()->withErrors($validator);
        }

        else    {

        $event = new Schedule;
        $event->title = $request['title'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['start_date'];
        $event->start_time = $request['start_time'];
        $event->end_time = $request['end_time'];
        $event->children_id = $request['children_id'];
        $event->therapist_id = Auth::user()->id;
       // $event->title = $request['title'];
       $event->save();

       //generate report
       $event = new TherapyReport;
       $event->therapy_name = $request['title'];
       $event->children_id = $request['children_id'];
       $event->therapist_id = Auth::user()->id;
       $event->date = $request['start_date'];
       $event->mark_as_done = '0';
       $event->save();



       \Session::flash('success', 'Appoinment added successfully');
       return Redirect::to('/therapist/children');



        }

    }

    public function showCalendar()  {
        $id = Auth::user()->id;
        $events = [];
        $data = Schedule::where('therapist_id',$id)->get();
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
            'viewRender' => 'function() {alert("Callbacks!");}',
            'select' => 'function() {
                alert();

                }',
                
        ]);
      

        //onclick add event
        



        return view('/therapist/schedule')->with(compact('calendar'));
    }
}
