<?php

use Illuminate\Database\Seeder;
use AutisticCare\TherapyTypes;

class AddTherapy extends Seeder
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
        	['name'=>'APPLIED BEHAVIOR ANALYSIS (ABA)'],
        	['name'=>'VERBAL BEHAVIOR THERAPY (VBT)'],
        	['name'=>'COGNITIVE BEHAVIORAL THERAPY (CBT)'],
            ['name'=>'DEVELOPMENTAL AND INDIVIDUAL DIFFERENCES RELATIONSHIP (DIR) therapy'],
            ['name'=>'RELATIONSHIP DEVELOPMENT INTERVENTION (RDI)'],

        ];
        foreach ($data as $key => $value) {
        	TherapyTypes::create($value);
    }
}

}