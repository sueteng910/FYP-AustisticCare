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
            'name' => 'required',
            'age' => 'required|numeric',
            
          
            
        ]);
        $children = new Children;
        $children->name = $request ->input('name');
        $children->age = $request ->input('age');
        $children->mother_id = $request ->input('parent');
        $children->therapist_id = $request ->input('therapist');

        $children ->save();
        

        //$data = $request->image;
        $data_id = $children ->id;
        $image = $request->children_pic;
        $extension = $image->getClientOriginalExtension();
        //Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));

        $image_name = $data_id.'.'.$extension;
        //$image_name = $image->getFilename().'.'.$extension;
        //$image_name=$image->getClientOriginalName();
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
