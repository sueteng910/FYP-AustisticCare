@extends('layouts.app')
@include('inc.therapistnavbar')
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
          @include('inc.therapistsidenav')
      </div>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Report of {{$report->therapy_name}} on {{$report->date}}</div>

                <div class="card-body">
                    
                

                      <div class="form-group">
                            <label for="name">Children Name</label>
                            <input type="text" readonly class="form-control" id="name" name = "children_name" aria-describedby="emailHelp" value = "{{$report->children->name}}">
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
                                <input type="text" readonly class="form-control" id="name" name = "description" aria-describedby="emailHelp" width="300px" >
                              </div>

                                            

                          
          
                      
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

