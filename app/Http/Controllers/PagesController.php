<?php

namespace AutisticCare\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use AutisticCare\Children;
use AutisticCare\User;



class PagesController extends Controller
{
    //
    public function index() {
        
        
        return view('/auth/login');
    }

    public function therahome() {
        return view('/therapist/home');
    }
    public function adminhome() {
        $childrens = Children::all();
        $therapist = User::where('role','therapist');
        return view ('/admin/home')->with(compact('childrens'))->with(compact('therapist'));
    }
    public function theracalendar() {
        return view ('/therapist/calendar');
    }

    public function therachildren() {
        $id = auth()->user()->id;
        $childrens = Children::where('therapist_id', $id )->get();
        return view ('/therapist/children')->with(compact('childrens'));
    }
}
