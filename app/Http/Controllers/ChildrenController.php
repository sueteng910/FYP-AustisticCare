<?php

namespace AutisticCare\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use AutisticCare\Children;
use AutisticCare\User;
use AutisticCare\Mother;



class ChildrenController extends Controller
{
    //

    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'name' => 'required'
            
          
            
        ]);
        $children = new Children;
        $children->name = $request ->input('name');
        $children->birthday = $request ->input('birthday');
        $children->gender = $request ->input('gender');

        $children->myKID = $request ->input('myKID');
        $children->therapist_id = $request ->input('therapist');

        $children ->save();
        

        
        //$data = $request->image;
        $data_id = $children ->id;
        $image = $request->children_pic;
        $extension = $image->getClientOriginalExtension();
        $image_name = $data_id.'.'.$extension;
        $image->move('images',$image_name);
        $children->children_pic = $image_name;
        $children ->save();


        

        

        return redirect('/admin/children/index');
        

    }
    public function create()    {

        $mothers = Mother::all();
        $therapist = User::where('role','therapist')->get();
        return view('/admin/children/create')->with(compact('mothers','therapist'));
    }
    public function show() {
        $childrens=Children::all();
        return view('/admin/children/index',compact('childrens'));

    }

    public function index() {
        $childrens=Children::all();
        return view('/admin/children/index',compact('childrens'));
    }

}
