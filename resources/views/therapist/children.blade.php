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
  <script>
  
      
      
  
      </script>
  <div id="sidebar" class="col-md-4">
          @include('inc.therapistsidenav')
      </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Children</div>

                <div class="card-body">
      
          <table id="products" class="table table-bordered">
              @if(count($childrens) > 0)
                <thead>
                  <tr>
                      <th><strong>ID</strong></th>
                      <th><strong>Name</strong></th>
                      <th><strong>Age</strong></th>
                      
                      <th><strong>Image</strong></th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Give HW</th>

                  
                  </tr>
                  
                </thead>
                <tbody>
                  @foreach($childrens as $data)
                  <tr>
                      <th>{{$data->id}}</th>
                      <th>{{$data->name}}</th>
                      <th>{{$data->age}}</th>     
                      <th><img src="/images/{{$data->children_pic}}"  style="width:200px;height:200px;"></th>
                      <th><a class="btn btn-primary" href="{{url('therapist/children/calendar')}}/{{$data->id}}" role="button">Schedule Therapy</a></th>
                      <th><a class="btn btn-primary" href="{{url('therapist/children/therapyreports')}}/{{$data->id}}" role="button">report</a>
                        <th><a class="btn btn-primary" href="{{url('therapist/children/homeworkList')}}/{{$data->id}}" role="button">homework</a>

                      </th>
                      
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