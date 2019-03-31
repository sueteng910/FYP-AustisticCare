@extends('layouts.app')
@include('inc.adminnavbar')
<script type="text/javascript" src="js/mdb.min.js">
  // SideNav Button Initialization
  $(".button-collapse").sideNav();
  // SideNav Scrollbar Initialization
  var sideNavScrollbar = document.querySelector('.custom-scrollbar');
  Ps.initialize(sideNavScrollbar);
  
  
  });
  // optional
  $('#blogCarousel').carousel({
          interval: 5000
      });
  
  </script>

     
  <div id="sidebar" class="col-md-4">
          @include('inc.sidenav')
      </div>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Children</div>

                <div class="card-body">
                    <form method="POST" action="{{action('ChildrenController@store')}}" accept-charset="UTF-8" data-parsley-validate="" enctype="multipart/form-data">
                      {{ csrf_field() }}    
                      <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name = "name" aria-describedby="emailHelp" placeholder="Enter name">
                          </div>
                          <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name = "age" placeholder="Age">
                          </div>
                          <div class="form-group">
                              <label for="parent">Parent</label>
                              <br>
                              <select name="parent" id= "parent" style="text-align: center; width:500px;" class="custom-select sources">
                                <div class="option">
                                    <option value="" disabled selected>Select the parent</option>
                                  @foreach($mothers as $mother)
                                      <option value="{{$mother->id}}">{{$mother->mother_name}}</option>
                                  @endforeach
                                </div>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="parent">Therapist</label>
                                <br>
                                <select name="therapist" id = "therapist" style="text-align: center; width:500px;" class="custom-select sources">
                                  <div class="option">
                                      <option value="" disabled selected>Select the therapist</option>

                                    @foreach($therapist as $mother)
                                        <option value="{{$mother->id}}">{{$mother->name}}</option>
                                    @endforeach
                                  </div>
                                </select>
                              </div>
                           
                         
                          <div class="form-group">
                              
                          <strong>Select Image:</strong>
                              <br/>
                              <input type="file" id="children_pic" name= "children_pic">
                              <br/>
                      
                      
                             
                            </div>
                            
                      
                          
          
                          <button class="btn btn-primary btn-success upload-result">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection