<?php

namespace AutisticCare\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
use AutisticCare\Schedule;
use AutisticCare\TherapyReport;


class TherapyController extends Controller
{
    //
    public function show($id)  {
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

    public function update(Request $request, $id)   {
        
    }
}
