<?php

namespace AutisticCare;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use DB;

class Children extends Model
{
    //

    protected $fillable=['name','age','parents_id','therapist_id','children_pic'];
    protected $guarded = [];
    
    public function mother()    {
        return  $this->hasOne('AutisticCare\Mother');
    }

    public function schedule()  {
        return $this->hasMany('AutisticCare\Schedule');
    }

}
