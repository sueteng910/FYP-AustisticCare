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
 <style>
    .slidecontainer {
      width: 100%;
    }
    
    .slider {
      -webkit-appearance: none;
      width: 100%;
      height: 15px;
      border-radius: 5px;
      background: #d3d3d3;
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
    }
    
    .slider:hover {
      opacity: 1;
    }
    
    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #4CAF50;
      cursor: pointer;
    }
    
    .slider::-moz-range-thumb {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #4CAF50;
      cursor: pointer;
    }
    </style>
      

     


<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Homework of {{$homework->title}}</div>

                <div class="card-body">
                    <form method="POST" action="{{action('MotherController@submit','$homework_id')}}" accept-charset="UTF-8" data-parsley-validate="" enctype="multipart/form-data">
                      {{ csrf_field() }}    
                      <input type="hidden" id="homework_id" name="homework_id" value="{!! $homework_id !!}">


                      <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" readonly class="form-control" id="name" name = "title" aria-describedby="emailHelp" value = "{{$homework->title}}">
                          </div>
                          <div class="form-group">
                            <label for="name">Description</label>
                            <input type="text" readonly class="form-control" id="name" name = "description" aria-describedby="emailHelp" value = "{{$homework->description}}">
                          </div>
                      <div class="form-group">
                            <label for="name">Step 1</label>
                            <input type="text" readonly class="form-control" id="name" name = "step_1" aria-describedby="emailHelp" value = "{{$homework->step_1}}">
                          </div>
                          <div class="form-group">
                            <label for="name">Step 2</label>
                            <input type="text" readonly class="form-control" id="name" name = "step_2" aria-describedby="emailHelp" value = "{{$homework->step_2}}">
                          </div>
                          <div class="form-group">
                            <label for="name">Step 3</label>
                            <input type="text" readonly class="form-control" id="name" name = "step_3" aria-describedby="emailHelp" value = "{{$homework->step_3}}">
                          </div>
                          
                       
                              <div class="form-group">
                                <label for="age">Review</label>
                                <input type="text"  class="form-control" id="review" name = "review" aria-describedby="emailHelp" width="300px" >
                              </div>

                             
          
                          <button class="btn btn-primary btn-success upload-result">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
     var slider2 = document.getElementById("performance");
    var output2 = document.getElementById("marks");
    output2.innerHTML = slider2.value;
    
    slider2.oninput = function() {
      output2.innerHTML = this.value;
    }
    </script>
</body>

