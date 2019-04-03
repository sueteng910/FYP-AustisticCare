

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
    
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    