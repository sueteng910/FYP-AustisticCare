@extends('layouts.app')
@include('inc.therapistnavbar')
@include('inc.tab')
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
    function openPage(pageName,elmnt,color) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
      }
      document.getElementById(pageName).style.display = "block";
      elmnt.style.backgroundColor = color;
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
    <div id="sidebar" class="col-md-4">
            @include('inc.therapistsidenav')
        </div>
        <body>
<div class="container">
<div class="panel">
    <table>
        <tbody>
            <tr class = "button">
                
            <td class = "1" width= 2500px><button class="tablink" onclick="openPage('Home', this, 'black')"id="defaultOpen">In Progress</button></td>
            <td class = "2" width= 2500px><button class="tablink" onclick="openPage('News', this, 'black')" >Completed</button></td>
            </tr>
        </tbody>
    </table>
        </div>
        <div class="panel">
            <div id="Home" class="tabcontent">
                    <table id="products" class="table table-bordered">
                            @if(count($undone) > 0)
                              <thead>
                                <tr>
                                    <th><strong>Date</strong></th>
                                    <th><strong>Children</strong></th>
                                    <th><strong>Therapy</strong></th>
                                    
                                    <th><strong>Image</strong></th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                
                                </tr>
                                
                              </thead>
                              <tbody>
                                @foreach($undone as $data)
                                <tr>
                                    <th>{{$data->created_at}}</th>
                                    <th>{{$data->children->name}}</th>
                                    <th>{{$data->therapy_name}}</th>     
                                    <th><img src="/images/{{$data->children_pic}}"  style="width:200px;height:200px;"></th>
                                    <th><a class="btn btn-primary" href="{{url('therapist/children/reports')}}/{{$data->id}}" role="button">Update</a></th>
                                    <th><a class="btn btn-primary" href="#" role="button">Link</a>
                                    </th>
                                    
                                </tr>
                                @endforeach
                              </tbody>
                            @else
                              <p>No products</p>
                            @endif
                
                            </table>
            </div>
            
            <div id="News" class="tabcontent">
              <h3>News</h3>
              <p>Some news this fine day!</p> 
            </div>
            
            <div id="Contact" class="tabcontent">
              <h3>Contact</h3>
              <p>Get in touch, or swing by for a cup of coffee.</p>
            </div>
            
            <div id="About" class="tabcontent">
              <h3>About</h3>
              <p>Who we are and what we do.</p>
            </div>
        </div>
</div>
        </body>            


  