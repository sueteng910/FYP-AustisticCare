<?php

use Illuminate\Database\Seeder;
use AutisticCare\Schedule;

class AddDummyEvent extends Seeder
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
        	['title'=>'Demo Event-1', 'start_date'=>'2019-03-11', 'end_date'=>'2019-03-12'],
        	['title'=>'Demo Event-2', 'start_date'=>'2019-03-11', 'end_date'=>'2019-03-13'],
        	['title'=>'Demo Event-3', 'start_date'=>'2019-03-14', 'end_date'=>'2019-03-14'],
        	['title'=>'Demo Event-3', 'start_date'=>'2019-03-17', 'end_date'=>'2019-03-17'],
        ];
        foreach ($data as $key => $value) {
        	Schedule::create($value);
    }
}
}
