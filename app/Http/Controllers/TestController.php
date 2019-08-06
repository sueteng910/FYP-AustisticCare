<?php

foreach ($goal as $goals)    {  
    $loop_2 = 0;
    foreach($therapy_type as $therapy_types)    { //3
        $count_arr[$loop_1][$loop_2]= TherapyReport::where('therapy_name', $therapy_types)
        ->where('goal', $goals->id)->where('mark_as_done', '1')->count();
        //$count_arr= array_add($count_arr, 'count', $therapy_types);
        $thera_get = TherapyReport::where('therapy_name', $therapy_types)
        ->where('goal', $goals->id)->where('mark_as_done', '1')->get();
        //7
        for ($i = 1; $i<=12; $i++ ){ //8
            $add = 1;
            $total_rating = 0;
            foreach($thera_get as $thera_gets) { //11
                $check_month = $thera_gets->date->month;
                if ($check_month == $i)   { //13
                    $rating = $thera_gets->rating;
                    if ($add == 1)  {  //15
                        $total_rating = $rating;
                        $add = $add + 1;
                    } 
                    else { //19
                                         
                        $total_rating = $total_rating + $rating;
                        $add = $add + 1;
                    }     //22                      
                } //23
            } //24
            $new_add = $add -1;
            if($new_add != 0)   { //26
            $total_rating = $total_rating/($add-1);
        }
            ${'thera_'.$loop_1}[$loop_2][$i] = $total_rating; //29
            
        } //30
        $loop_2 = $loop_2 +1;
    }//31
    $loop_1 = $loop_1 +1;
}//32
