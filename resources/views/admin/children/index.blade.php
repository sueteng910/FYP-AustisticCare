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
                  
                  </tr>
                  
                </thead>
                <tbody>
                  @foreach($childrens as $data)
                  <tr>
                      <th>{{$data->id}}</th>
                      <th>{{$data->name}}</th>
                      <th>{{$data->age}}</th>     
                      <th><img src="/images/{{$data->children_pic}}"  style="width:200px;height:200px;"></th>
                      <th><a href="{{url('admin/edit-products')}}/{{$data->id}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i></a></th>
                      <th><a href="{{url('deleteproducts')}}/{{$data->id}}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-trash"></i></a></th>
                      
                    
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