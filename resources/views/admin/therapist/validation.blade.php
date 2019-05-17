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
      .myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
  </style>
      
      
  
    
  <div id="sidebar" class="col-md-4">
          @include('inc.sidenav')
      </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Therspist Validation</div>

                <div class="card-body">
      
          <table id="products" class="table table-bordered">
              @if(count($therapist) > 0)
                <thead>
                  <tr>
                      <th><strong>ID</strong></th>
                      <th><strong>Name</strong></th>
                      <th><strong>Email</strong></th>
                      
                      <th><strong>Image</strong></th>
                      <th>Edit</th>
                      <th>Delete</th>
                  
                  </tr>
                  
                </thead>
                <tbody>
                  @foreach($therapist as $data)
                  <tr>
                    <?php $profile_pic = $data->profile_pic; 
                    $ic_pic = $data->ic_pic;?>
                <form method="POST" action="{{action('AdminController@verify')}}" accept-charset="UTF-8" data-parsley-validate="" enctype="multipart/form-data">
                  {{ csrf_field() }}    
                  <input type="hidden" id="therapist_id" name="therapist_id" value="{!! $data->id !!}">

                      <th>{{$data->id}}</th>
                      <th>{{$data->name}}</th>
                      <th>{{$data->email}}</th>     
                      <th><img id = myImg class = "myImg" src="/images/thera/profile_pic/{{$data->profile_pic}}"  style="width:200px;height:200px;"></th>
                      <th><img id = myImg2  class = "myImg" src="/images/thera/ic_pic/{{$data->ic_pic}}"  style="width:200px;height:200px;"></th>
                      <th><button class="btn btn-primary btn-success upload-result">Verify</button></th>
                  </form>

                    
                  </tr>
                  <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"> yoo</div>
                  </div>
                  <div id="myModal2" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img02">
                    <div id="caption"></div>
                  </div>
                  <script>
                      // Get the modal
                      var modal = document.getElementById('myModal');
                      
                      // Get the image and insert it inside the modal - use its "alt" text as a caption
                      var img = document.getElementById('myImg');
                      var modalImg = document.getElementById("img01");
                      var captionText = document.getElementById("caption");
                      img.onclick = function(){
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                      }
                      
                      // Get the <span> element that closes the modal
                      var span = document.getElementsByClassName("close")[0];
                      
                      // When the user clicks on <span> (x), close the modal
                      span.onclick = function() { 
                        modal.style.display = "none";
                      }
                      </script>
                  @endforeach
                </tbody>
              @else
                <p>No therapist</p>
              @endif
  
              </table>
             
                  <script>
                      // Get the modal
                      var modal = document.getElementById('myModal');
                      
                      // Get the image and insert it inside the modal - use its "alt" text as a caption
                      var img = document.getElementById('myImg2');
                      var modalImg = document.getElementById("img01");
                      var captionText = document.getElementById("caption");
                      img.onclick = function(){
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        captionText.innerHTML = this.alt;
                      }
                      
                      // Get the <span> element that closes the modal
                      var span = document.getElementsByClassName("close")[0];
                      
                      // When the user clicks on <span> (x), close the modal
                      span.onclick = function() { 
                        modal.style.display = "none";
                      }
                      </script>
                
          

            </div>
          </div>
      </div>
  </div>