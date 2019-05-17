<?php

use Illuminate\Database\Seeder;
use AutisticCare\TherapyReport;

class AddTherapyReport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
        	['date'=>'2019-04-09',
        	'start_time'=>'10:00:00',
        	'end_time'=>'12:00:00',
            'therapy_name'=>'DEVELOPMENTAL AND INDIVIDUAL DIFFERENCES RELATIONSHIP (DIR) therapy',
            'children_id'=>'1', 'therapist_id'=> '3', 'goal'=>'1', 'description'=> 'good', 'rating'=>'4', 'mark_as_done'=>'1'],

        ];
        foreach ($data as $key => $value) {
        	TherapyReport::create($value);
    }
    }
}
