<?php

use Illuminate\Database\Seeder;
use AutisticCare\Aspect;

class AddAspects extends Seeder
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
        	['title'=>'SOCIAL COMMUNICATION'],
        	['title'=>'EMOTIONAL UNDERSTANDING'],
        	['title'=>'LEARNING'],
          
        ];
        foreach ($data as $key => $value) {
        	Aspect::create($value);
    }
    }
}
