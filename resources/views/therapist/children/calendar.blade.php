

<head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

</head>
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
          @include('inc.therapistsidenav')
      </div>
<div class="container">
    <div class="row">
      
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Full Calendar Example</div>
                {!! $newid !!}

                <div class="panel-body">
                    <form method="POST" action="{{action('ScheduleController@addEvent', '$newid')}}" accept-charset="UTF-8" data-parsley-validate="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" id="custId" name="children_id" value="{!! $newid !!}">

                      <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            @if (Session::has('success'))
                               <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @elseif (Session::has('warnning'))
                                <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                            @endif
  
                        </div>
  
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <div class="form-group">
                                  <label for="title">Therapy Title</label>
                                  <div class="">
                                  <input type="text" class="form-control" id="title" name = "title" aria-describedby="emailHelp" placeholder="Enter name">
                              </div>
                          </div>
                        </div>
  
                        <div class="col-xs-3 col-sm-3 col-md-3">
                          <div class="form-group">
                                  <label for="start_date">Start Date</label>
                            <div class="">
                                  <input type="date" class="form-control" id="start_date" name = "start_date" >
                            </div>
                          </div>
                        </div>
  
                        <div class="col-xs-3 col-sm-3 col-md-3">
                          <div class="form-group">
                                  <label for="end_date">End Date</label>
                            <div class="">
                                  <input type="date" class="form-control" id="end_date" name = "end_date" >
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                        <label for="title">Start Time</label>
                                        <div class="">
                                        <input type="time" class="form-control" id="title" name = "start_time">
                                    </div>
                                </div>
                              </div>
                              <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                            <label for="title">End Time</label>
                                            <div class="">
                                            <input type="time" class="form-control" id="title" name = "end_time">
                                        </div>
                                    </div>
                                  </div>
        
  
                        <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                          <button class="btn btn-primary btn-success upload-result">Submit</button>
                      </div>
                      </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Full Calendar Example</div>

                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>


