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
        	['date'=>'2019-05-09',
        	'start_time'=>'10:00:00',
        	'end_time'=>'12:00:00',
            'therapy_name'=>'VERBAL BEHAVIOR THERAPY (VBT)',
            'children_id'=>'2', 'therapist_id'=> '2', 'goal'=>'7', 'description'=> 'good', 'rating'=>'8', 'mark_as_done'=>'1'],

        ];
        foreach ($data as $key => $value) {
        	TherapyReport::create($value);
    }
    }
}
