<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@extends('layouts.app')
@include('inc.therapistnavbar')

<script type="text/javascript" src="js/mdb.min.js">
  // SideNav Button Initialization
  $(".button-collapse").sideNav();
  // SideNav Scrollbar Initialization
  var sideNavScrollbar = document.querySelector('.custom-scrollbar');
  Ps.initialize(sideNavScrollbar);
  
  

  // optional
  $('#blogCarousel').carousel({
          interval: 5000
      });


      

    


    
  
  </script>
  <script>
   $(document).ready(function(){
    var next = 1;

    $(".add-more").click(function(e){
      alert("prior " + next);

      if (next < 3) {
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="form-control" id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
      }
      else{
        alert("Maximum is 5 " + next);

      }
      $('.remove-me').click(function(e){
              
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
                next = next - 1;
                $("#count").val(next);  
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));

                alert(next);
  
    });
    });
    

    
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
                <div class="card-header">Add Homework</div>

                <div class="card-body">
                    <form method="POST" action="{{action('HomeworkController@update','$newid')}}" accept-charset="UTF-8" data-parsley-validate="" enctype="multipart/form-data">
                      {{ csrf_field() }}    
                      <input type="hidden" id="custId" name="newid" value="{!! $newid !!}">

                      <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text"  class="form-control" id="title" name = "title" aria-describedby="emailHelp" >
                          </div>
                     
                          
                              <div class="form-group">
                                <label for="age">Description</label>
                                ​<textarea id="description" name = "description"class="form-control" rows="10" ></textarea>

                              </div>
                              <div class="form-group">
                                <label for="name">Due</label>
                                <input type="date"  class="form-control" id="due4" name = "due" aria-describedby="emailHelp" >
                              </div>
                              <div class="form-group">
                                <label for="age">Step 1</label>
                                <input type="text"  class="form-control" id="step_1" name = "step_1" aria-describedby="emailHelp" >
                              </div>
                              <div class="form-group">
                                <label for="age">Step 2</label>
                                <input type="text"  class="form-control" id="step_2" name = "step_2" aria-describedby="emailHelp" >
                              </div>
                              <div class="form-group">
                                <label for="age">Step 3</label>
                                <input type="text"  class="form-control" id="step_3" name = "step_3" aria-describedby="emailHelp" >

                                    
                                </div>
               
                           
                         
                          
                      
                          
          
                          <button class="btn btn-primary btn-success upload-result">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
