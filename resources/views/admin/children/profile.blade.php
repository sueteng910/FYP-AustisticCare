@extends('layouts.app')
@include('inc.navbar')
<head>
<style>
    .img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 200px;
}

    </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

  
        
    </head>
<div class="container">
        @include('inc.sidenav')
        <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Profile</div>
                            <div class="row">
                                    <div class="col-lg-3">
                                            <img src="/images/{{$childrens->children_pic}}" alt="John" style="width:200px;height:200px;" >
                                    </div>
                                    <div class="col-lg-4">
                                        <p>Name : {{$childrens->name}}</p>
                                        <p>Age : {{$childrens->age}}</p>
                                        <p>Parent : {{$childrens->mother->name}}</p>
                                        <p>Enrolled since : {{$childrens->created_at->month}} {{$childrens->created_at->year}}</p>
                                      
                                    </div>
                                    
                                   
                            
                                   
                                        </div>
                        </div>


                        
         
           {{$loop_1}} 
                
            @if ($goal_count > 0)
            <?php  $goal_count = $goal_count-$goal_count;
             $goal_count_1 = $goal_count-$goal_count;
             
             ?>
            @foreach($goal as $goal)
            <?php $data_0 = $count_arr[$goal_count][0];
            $data_1 = $count_arr[$goal_count][1];
            $data_2 = $count_arr[$goal_count][2];
            $data_3 = $count_arr[$goal_count][3];
            $data_4 = $count_arr[$goal_count][4];

            $thera_num = 0;
            $line_a1= ${'thera_'.$goal_count}[$thera_num][1];
            $line_a2= ${'thera_'.$goal_count}[$thera_num][2];
            $line_a3= ${'thera_'.$goal_count}[$thera_num][3];
            $line_a4= ${'thera_'.$goal_count}[$thera_num][4];
            $line_a5= ${'thera_'.$goal_count}[$thera_num][5];
            $line_a6= ${'thera_'.$goal_count}[$thera_num][6];
            $line_a7= ${'thera_'.$goal_count}[$thera_num][7];
            $line_a8= ${'thera_'.$goal_count}[$thera_num][8];
            $line_a9= ${'thera_'.$goal_count}[$thera_num][9];
            $line_a10= ${'thera_'.$goal_count}[$thera_num][10];
            $line_a11= ${'thera_'.$goal_count}[$thera_num][11];
            $line_a12= ${'thera_'.$goal_count}[$thera_num][12];

            $thera_num = $thera_num + 1;
            $line_b1= ${'thera_'.$goal_count}[$thera_num][1];
            $line_b2= ${'thera_'.$goal_count}[$thera_num][2];
            $line_b3= ${'thera_'.$goal_count}[$thera_num][3];
            $line_b4= ${'thera_'.$goal_count}[$thera_num][4];
            $line_b5= ${'thera_'.$goal_count}[$thera_num][5];
            $line_b6= ${'thera_'.$goal_count}[$thera_num][6];
            $line_b7= ${'thera_'.$goal_count}[$thera_num][7];
            $line_b8= ${'thera_'.$goal_count}[$thera_num][8];
            $line_b9= ${'thera_'.$goal_count}[$thera_num][9];
            $line_b10= ${'thera_'.$goal_count}[$thera_num][10];
            $line_b11= ${'thera_'.$goal_count}[$thera_num][11];
            $line_b12= ${'thera_'.$goal_count}[$thera_num][12];

            $thera_num = $thera_num + 1;
            $line_c1= ${'thera_'.$goal_count}[$thera_num][1];
            $line_c2= ${'thera_'.$goal_count}[$thera_num][2];
            $line_c3= ${'thera_'.$goal_count}[$thera_num][3];
            $line_c4= ${'thera_'.$goal_count}[$thera_num][4];
            $line_c5= ${'thera_'.$goal_count}[$thera_num][5];
            $line_c6= ${'thera_'.$goal_count}[$thera_num][6];
            $line_c7= ${'thera_'.$goal_count}[$thera_num][7];
            $line_c8= ${'thera_'.$goal_count}[$thera_num][8];
            $line_c9= ${'thera_'.$goal_count}[$thera_num][9];
            $line_c10= ${'thera_'.$goal_count}[$thera_num][10];
            $line_c11= ${'thera_'.$goal_count}[$thera_num][11];
            $line_c12= ${'thera_'.$goal_count}[$thera_num][12];

            $thera_num = $thera_num + 1;
            $line_d1= ${'thera_'.$goal_count}[$thera_num][1];
            $line_d2= ${'thera_'.$goal_count}[$thera_num][2];
            $line_d3= ${'thera_'.$goal_count}[$thera_num][3];
            $line_d4= ${'thera_'.$goal_count}[$thera_num][4];
            $line_d5= ${'thera_'.$goal_count}[$thera_num][5];
            $line_d6= ${'thera_'.$goal_count}[$thera_num][6];
            $line_d7= ${'thera_'.$goal_count}[$thera_num][7];
            $line_d8= ${'thera_'.$goal_count}[$thera_num][8];
            $line_d9= ${'thera_'.$goal_count}[$thera_num][9];
            $line_d10= ${'thera_'.$goal_count}[$thera_num][10];
            $line_d11= ${'thera_'.$goal_count}[$thera_num][11];
            $line_d12= ${'thera_'.$goal_count}[$thera_num][12];

            $thera_num = $thera_num + 1;
            $line_e1= ${'thera_'.$goal_count}[$thera_num][1];
            $line_e2= ${'thera_'.$goal_count}[$thera_num][2];
            $line_e3= ${'thera_'.$goal_count}[$thera_num][3];
            $line_e4= ${'thera_'.$goal_count}[$thera_num][4];
            $line_e5= ${'thera_'.$goal_count}[$thera_num][5];
            $line_e6= ${'thera_'.$goal_count}[$thera_num][6];
            $line_e7= ${'thera_'.$goal_count}[$thera_num][7];
            $line_e8= ${'thera_'.$goal_count}[$thera_num][8];
            $line_e9= ${'thera_'.$goal_count}[$thera_num][9];
            $line_e10= ${'thera_'.$goal_count}[$thera_num][10];
            $line_e11= ${'thera_'.$goal_count}[$thera_num][11];
            $line_e12= ${'thera_'.$goal_count}[$thera_num][12];
            
            ?>
                <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                <div class="card-header">Goal: {{$goal->title}}</div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="start_date">How well can {{$childrens->name}} perform {{$goal->title}} so far?</label>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$goal->progress}}%">
                                        {{$goal->progress}} Complete (success)
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                
                                   <?php ?>
                                    
                                <div class="row">
                                  <div class="col-md-12">
                                      <label for="start_date">How many therapies had been done?</label>
                                      <div class="col-md-12" >
                                        <div class="chart-container" style="position: relative; height:40vh; width:40vw">

                                        <canvas id="myChart{{$goal_count }}" style = "height:40vh; width:40vw"></canvas>
                                        </div>
                                        <script>
                                            var goal_count = 0;
                                            //var data_1 = $count_arr[$goal_count][0];
                                        var ctx = document.getElementById("myChart"+{{ $goal_count }});
                                        var myChart = new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                labels: ['APPLIED BEHAVIOR ANALYSIS (ABA)', 'VERBAL BEHAVIOR THERAPY (VBT)', 'COGNITIVE BEHAVIORAL THERAPY (CBT)', 'DEVELOPMENTAL AND INDIVIDUAL DIFFERENCES RELATIONSHIP (DIR) therapy', 'RELATIONSHIP DEVELOPMENT INTERVENTION (RDI)'],
                                                datasets: [{
                                                    fill: false, 
                                                    label: '# of Votes',
                                                    data: [{{$data_0}}, {{$data_1}}, {{$data_2}}, {{$data_3}}, {{$data_4}}],
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
                                        goal_count = goal_count+1;
                                        </script>
                                      
                                      </div>
                                      
                                  </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                    <label for="start_date">Average of therapy peformance each month:</label>
                                    <div class="col-md-12" >
                                      <div class="chart-container" style="position: relative; height:50vh; width:50vw">

                                      <canvas id="Chart{{$goal_count_1 }}" style = "height:50vh; width:50vw"></canvas>
                                      </div>
                                      <script>
                                          var goal_count_1 = 0;
                                          //var data_1 = $count_arr[$goal_count][0];
                                      var ctx = document.getElementById("Chart"+{{ $goal_count_1 }});
                                      var myChart = new Chart(ctx, {
                                          type: 'line',
                                          data: {
                                              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'september', 'October', 'November', 'December'],
                                              datasets: [{
                                                  fill: false, 
                                                  label: 'ABA',
                                                  data: [{{$line_a1}}, {{$line_a2}}, {{$line_a3}}, {{$line_a4}} ,{{$line_a5}}, {{$line_a6}} ,{{$line_a7}}, {{$line_a8}},{{$line_a9}},{{$line_a10}},{{$line_a11}}, {{$line_a12}}],
                                                  
                                                  
                                                  
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
                                              },
                                              {
                                                fill: false, 
                                                  label: 'VBT',
                                                  
                                                  data: [{{$line_b1}}, {{$line_b2}}, {{$line_b3}}, {{$line_b4}} ,{{$line_b5}}, {{$line_b6}} ,{{$line_b7}}, {{$line_b8}},{{$line_b9}},{{$line_b10}},{{$line_b11}}, {{$line_b12}}],
                                                  
                                                  
                                                  
                                                  backgroundColor: [
                                                      
                                                      'rgba(75, 192, 192, 0.2)',
                                                      'rgba(153, 102, 255, 0.2)',
                                                      'rgba(255, 159, 64, 0.2)'
                                                  ],
                                                  borderColor: [
                                                      
                                                      'rgba(75, 192, 192, 1)',
                                                      'rgba(153, 102, 255, 1)',
                                                      'rgba(255, 159, 64, 1)'
                                                  ],
                                                  borderWidth: 1
                                              },
                                              {fill: false, 
                                                  label: 'CBT',
                                                  
                                                  data: [{{$line_c1}}, {{$line_c2}}, {{$line_c3}}, {{$line_c4}} ,{{$line_c5}}, {{$line_c6}} ,{{$line_c7}}, {{$line_c8}},{{$line_c9}},{{$line_c10}},{{$line_c11}}, {{$line_c12}}],
                                                 
                                                  
                                                  
                                                  backgroundColor: [
                                                     
                                                      'rgba(54, 162, 235, 0.2)',
                                                      'rgba(255, 206, 86, 0.2)',
                                                      'rgba(75, 192, 192, 0.2)',
                                                      'rgba(153, 102, 255, 0.2)',
                                                      'rgba(255, 159, 64, 0.2)'
                                                  ],
                                                  borderColor: [
                                                      
                                                      'rgba(54, 162, 235, 1)',
                                                      'rgba(255, 206, 86, 1)',
                                                      'rgba(75, 192, 192, 1)',
                                                      'rgba(153, 102, 255, 1)',
                                                      'rgba(255, 159, 64, 1)'
                                                  ],
                                                  borderWidth: 1
                                                  },
                                                  {
                                                    fill: false, 
                                                  label: 'RDI',
                                                  
                                                  data: [{{$line_d1}}, {{$line_d2}}, {{$line_d3}}, {{$line_d4}} ,{{$line_d5}}, {{$line_d6}} ,{{$line_d7}}, {{$line_d8}},{{$line_d9}},{{$line_d10}},{{$line_d11}}, {{$line_d12}}],
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                                                  
                                                  
                                                  backgroundColor: [
                                                     
                                                      
                                                      'rgba(255, 206, 86, 0.2)',
                                                      'rgba(75, 192, 192, 0.2)',
                                                      'rgba(153, 102, 255, 0.2)',
                                                      'rgba(255, 159, 64, 0.2)'
                                                  ],
                                                  borderColor: [
                                                      
                                                      
                                                      'rgba(255, 206, 86, 1)',
                                                      'rgba(75, 192, 192, 1)',
                                                      'rgba(153, 102, 255, 1)',
                                                      'rgba(255, 159, 64, 1)'
                                                  ],
                                                  borderWidth: 1

                                                  },
                                                  {
                                                    fill: false, 
                                                  label: 'DIR',
                                                  
                                                  data: [{{$line_e1}}, {{$line_e2}}, {{$line_e3}}, {{$line_e4}} ,{{$line_e5}}, {{$line_e6}} ,{{$line_e7}}, {{$line_e8}},{{$line_e9}},{{$line_e10}},{{$line_e11}}, {{$line_e12}}],
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                                                  
                                                  
                                                  backgroundColor: [
                                                     
                                                      
                                                      
                                                      'rgba(153, 102, 255, 0.2)',
                                                      'rgba(255, 159, 64, 0.2)'
                                                  ],
                                                  borderColor: [
                                                      
                                                      
                                                      
                                                      'rgba(153, 102, 255, 1)',
                                                      'rgba(255, 159, 64, 1)'
                                                  ],
                                                  borderWidth: 1
                                                  }
                                              
                                              ]
                                          },
                                          options: {
                                            scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
                                          }
                                      });
                                      goal_count_1 = goal_count_1+1;
                                      </script>
                                    
                                    </div>
                                    
                                </div>
                            </div>



                          </div>
                        </div>
                </div>
                <?php $goal_count = $goal_count +1;
                $goal_count_1 = $goal_count_1 +1;?>
             
                @endforeach

                @else
                no goal
                @endif
                





        </div>
                        
                       
        
        
            
        </div>
</div>

   

