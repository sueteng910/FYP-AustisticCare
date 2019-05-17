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
      

     
  <div id="sidebar" class="col-md-4">
          @include('inc.sidenav')
      </div>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Report of {{$report->children->name}} on {{$report->date}}</div>

                <div class="card-body">
                    <form method="POST" action="{{action('TherapyController@update','$newid')}}" accept-charset="UTF-8" data-parsley-validate="" enctype="multipart/form-data">
                      {{ csrf_field() }}    
                   
                      <input type="hidden" id="custId" name="newid" value="{!! $newid !!}">
                      <input type="hidden" id="children_id" name="newid" value="{!! $report->children_id !!}">

                      <div class="form-group">
                            <label for="name">Children Name</label>
                            <input type="text" readonly class="form-control" id="name" name = "children_name" aria-describedby="emailHelp" value = "{{$report->children->name}}">
                          </div>
                          <div class="form-group">
                            <label for="name">Goal</label>
                            <input type="text" readonly class="form-control" id="name" name = "goal" aria-describedby="emailHelp" value = "{{$goal->title}}">
                          </div>
                      <div class="form-group">
                            <label for="name">Therapy Name</label>
                            <input type="text" readonly class="form-control" id="name" name = "therapy_name" aria-describedby="emailHelp" value = "{{$report->therapy_name}}">
                          </div>
                          <div class="form-group">
                            <label for="age">Start Time</label>
                            <input type="text" readonly class="form-control" id="name" name = "start_time" aria-describedby="emailHelp" value = "{{$report->start_time}}">
                          </div>
                          <div class="form-group">
                                <label for="age">End Time</label>
                                <input type="text" readonly class="form-control" id="name" name = "end_time" aria-describedby="emailHelp" value = "{{$report->end_time}}">
                              </div>
                              <div class="form-group">
                                <label for="age">Description</label>
                                <input type="text"  class="form-control" id="name" name = "description" aria-describedby="emailHelp" width="300px" >
                              </div>

                              <div class="form-group">
                                <label for="age">[Therapy performance] How would you rate {{$report->children->name}}'s performance?</label>
                                <br><label for="age">1 is the worst, 10 is the best </label>

                                <div class="slidecontainer">
                                  <input type="range" min="1" max="10" value="5" class="slider" id="rating" name="rating">
                                  <p>Performance: <span id="score" name="score"></span></p>
                                </div>    
                                <script>
                                    var slider = document.getElementById("rating");
                                    var output = document.getElementById("score");
                                    output.innerHTML = slider.value;
                                    
                                    slider.oninput = function() {
                                      output.innerHTML = this.value;
                                      
                                    }
                                    
                                
                                   
                                  </script>
                                <div class="form-group">
                                  <label for="age">[Goal achievement] How well can {{$report->children->name}} perform {{$report->goal}}?</label>
                                  <input type="range" min="0" max="100" value="50" class="slider" id="performance" name="performance">
                                  <p>Performance: <span id="marks" name="marks"></span>%</p>
                                </div>                                  </div>                        

                         
                               
                           
                         
                          
                      
                          
          
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

