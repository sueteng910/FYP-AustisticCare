<?php

namespace AutisticCare\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
use AutisticCare\Schedule;
use AutisticCare\TherapyReport;
use Illuminate\Support\Facades\Redirect;
use AutisticCare\Goal;




class TherapyController extends Controller
{
    //
    public function showList($id)  {
        $therapist_id = Auth::user()->id;
        $done = TherapyReport::where('mark_as_done', '1')
        ->where('therapist_id',$therapist_id )
        ->where('children_id', $id)
        ->with('children')
        ->get();
        $undone = TherapyReport::where('mark_as_done', '0')
        ->where('therapist_id',$therapist_id )
        ->where('children_id', $id)
        ->with('children')

        ->get();
        
        return view ('/therapist/children/therapyreports')->with(compact('done'))->with(compact('undone'))->with(compact('id'));    
    }

    public function show(Request $request, $id)   {
        $newid = $id;
        $report = TherapyReport::where('id', $id)->with('children')->with('goal_1')->first();
        $goal = $report->goal;
        $goal = Goal::where('id', $goal)->first();
        return view('/therapist/children/reports')->with(compact('report'))->with(compact('newid'))->with(compact('goal'));
    }

    public function update(Request $request, $id=null)   {
        $id = $request['newid'];
        $report = TherapyReport::find($id);
        $goal = $report->goal;

        $report->description = $request['description'];
        $report->mark_as_done = 1;
        $report->rating = $request['rating'];
        $report->progress = $request['performance'];
        $report->save();
        return Redirect::to('/therapist/children');
    }

    public function showAll()   {
        $therapist_id = Auth::user()->id;
        $done = TherapyReport::where('mark_as_done', '1')
        ->where('therapist_id',$therapist_id )
        ->get();
        $undone = TherapyReport::where('mark_as_done', '0')
        ->where('therapist_id',$therapist_id )


        ->get();

        return view ('/therapist/reports')->with(compact('done'))->with(compact('undone'));    
    }
}
