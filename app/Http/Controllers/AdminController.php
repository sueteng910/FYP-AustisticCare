<?php

namespace AutisticCare\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
   
    public function view()  {
        //$products=Product::all();
        return view('/admin/adminviewchildren');
    }
    
    
}

