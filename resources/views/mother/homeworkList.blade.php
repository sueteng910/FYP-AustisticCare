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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Homework List</div>

                <div class="card-body">
      
          <table id="products" class="table table-bordered">
              @if(count($data) > 0)
                <thead>
                  <tr>
                      <th><strong>Title</strong></th>
                      <th><strong>Description</strong></th>
                      
                      <th></th>
                   

                  
                  </tr>
                  
                </thead>
                <tbody>
                  @foreach($data as $data)
                  <tr>
                      <th>{{$data->title}}</th>
                      <th>{{$data->description}}</th>
                      <th><a class="btn btn-primary" href="{{url('mother/homework')}}/{{$data->id}}" role="button">Start now</a></th>

                      </th>
                      
                  </tr>
                  @endforeach
                </tbody>
              @else
                <p>No homework</p>
              @endif
  
              </table>
          

            </div>
          </div>
      </div>
  </div>