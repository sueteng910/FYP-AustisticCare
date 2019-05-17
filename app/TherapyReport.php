<?php

namespace AutisticCare;

use Illuminate\Database\Eloquent\Model;
use DB;

class TherapyReport extends Model
{
    //
    protected $table = 'therapy_reports';

    public function children()  {
        return $this->belongsTo(Children::class);
    }
    public function goal_1()  {
        return $this->belongsTo(Goal::class);
    }
    protected $dates = [
        'date',
    ];

}
