@extends('layouts.app')
@include('inc.therapistnavbar')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        .card1 {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 300px;
          margin: auto;
          text-align: center;
          font-family: arial;
        }
        
        .title {
          color: grey;
          font-size: 18px;
        }
        
        .button {
          border: none;
          outline: 0;
          display: inline-block;
          padding: 8px;
          color: white;
          background-color: #000;
          text-align: center;
          cursor: pointer;
          width: 100%;
          font-size: 18px;
        }
        
        .a1 {
          text-decoration: none;
          font-size: 22px;
          color: black;
        }
        
        button:hover, a:hover {
          opacity: 0.7;
        }
        </style>
        </head>

<div class="container">
        @include('inc.therapistsidenav')
        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Children</div>
                            
                            <div class="row">
                            @forelse($childrens as $children)
                                <div class="col-md-3">
                                 <div class="card1">
                                    <img src="/images/{{$children->children_pic}}" alt="John" style="width:200px;height:200px;">
                                    <h1>{{$children->name}}</h1>
                                    <p class="title">{{$children->age}}</p>
                                    
                                    <p> <a href="{{url('therapist/children/profile')}}/{{$children->id}}" class="button">View</a>
                                    </p>
                                  </div>
                                </div>
                                @empty
                               <p> No user</p>
                                @endforelse
                            </div>
                        </div>



                </div>
        </div>
                        
                       
        
        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">Overview</div>
                        <div class="col-md-12" >
                          <div class="chart-container" style="position: relative; height:40vh; width:40vw">

                          <canvas id="myChart" style = "height:40vh; width:40vw"></canvas>
                          </div>
                          <script>
                              //var data_1 = $count_arr[$goal_count][0];
                          var ctx = document.getElementById("myChart");
                          var myChart = new Chart(ctx, {
                              type: 'pie',
                              data: {
                                  labels: ['Female', 'Male'],
                                  datasets: [{
                                      fill: false, 
                                      label: '# of Votes',
                                      data: [{{$female}}, {{$male}}],
                                      backgroundColor: [
                                          'rgba(255, 99, 132, 0.2)',
                                          'rgba(54, 162, 235, 0.2)',
                                          'rgba(255, 206, 86, 0.2)',
                                          'rgba(75, 192, 192, 0.2)',
                                          'rgba(153, 102, 255, 0.2)',
                                          'rgba(255, 159, 64, 0.2)'
                                      ],
                                      borderColor: [
                                          'rgba(255, 99, 132, 1)',
                                          'rgba(54, 162, 235, 1)',
                                          'rgba(255, 206, 86, 1)',
                                          'rgba(75, 192, 192, 1)',
                                          'rgba(153, 102, 255, 1)',
                                          'rgba(255, 159, 64, 1)'
                                      ],
                                      borderWidth: 1
                                  }]
                              },
                              options: {
                                  
                              }
                          });
                          </script>
                        
                        </div>
                        
                    </div>
                </div>
                          
                
               
                
                
                
                
               
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="card">
                                        <div class="card-header">Total therapy of this month</div>
                                        <div class="col-md-12" >
                                          <div class="chart-container" style="position: relative; height:40vh; width:40vw">
                
                                          <canvas id="myChart" style = "height:40vh; width:40vw"></canvas>
                                          </div>
                                          <script>
                                              //var data_1 = $count_arr[$goal_count][0];
                                          var ctx = document.getElementById("myChart");
                                          var myChart = new Chart(ctx, {
                                              type: 'pie',
                                              data: {
                                                  labels: ['Female', 'Male'],
                                                  datasets: [{
                                                      fill: false, 
                                                      label: '# of Votes',
                                                      data: [{{$female}}, {{$male}}],
                                                      backgroundColor: [
                                                          'rgba(255, 99, 132, 0.2)',
                                                          'rgba(54, 162, 235, 0.2)',
                                                          'rgba(255, 206, 86, 0.2)',
                                                          'rgba(75, 192, 192, 0.2)',
                                                          'rgba(153, 102, 255, 0.2)',
                                                          'rgba(255, 159, 64, 0.2)'
                                                      ],
                                                      borderColor: [
                                                          'rgba(255, 99, 132, 1)',
                                                          'rgba(54, 162, 235, 1)',
                                                          'rgba(255, 206, 86, 1)',
                                                          'rgba(75, 192, 192, 1)',
                                                          'rgba(153, 102, 255, 1)',
                                                          'rgba(255, 159, 64, 1)'
                                                      ],
                                                      borderWidth: 1
                                                  }]
                                              },
                                              options: {
                                                  
                                              }
                                          });
                                          </script>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
                </div>
                </div>
                </div>
                
            
        </div>
</div>


    
  


