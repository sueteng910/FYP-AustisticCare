<?php

namespace AutisticCare;

use Illuminate\Database\Eloquent\Model;
use DB;

class Goal extends Model
{
    //
    protected $fillable=['title','category','progress','children_id','complete'];
    protected $guarded = [];

    public function schedule()  {
        return $this->hasMany('AutisticCare\Schedule');
    }
    public function report()  {
        return $this->hasMany('AutisticCare\TherapyReport');
    }
}
