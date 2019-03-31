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
    <div class="row">
        test
        @include('inc.profileslider')
    </div>
</div>


