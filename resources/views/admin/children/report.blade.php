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
  <script>
  
      
      
  
      </script>
  <div id="sidebar" class="col-md-4">
          @include('inc.sidenav')
      </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Report</div>

                <div class="card-body">
      
          <table id="products" class="table table-bordered">
              @if(count($report) > 0)
                <thead>
                  <tr>
                      <th><strong>Date</strong></th>
                      <th><strong>Time</strong></th>
                      <th><strong>Therapy Name</strong></th>
                      <th>Option</th>
                  
                  </tr>
                  
                </thead>
                <tbody>
                  @foreach($report as $data)
                  <tr>
                      <th>{{$data->date}}</th>
                      <th>{{$data->start_time}}</th>
                      <th>{{$data->therapy_name}}</th>     
                      <th><a href="{{url('admin/children/details')}}/{{$data->id}}" class="btn btn-default btn-sm"></i>View</a></th>
                      
                    
                  </tr>
                  @endforeach
                </tbody>
              @else
                <p>No products</p>
              @endif
  
              </table>
          

            </div>
          </div>
      </div>
  </div>