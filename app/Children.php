<?php

namespace AutisticCare;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use DB;

class Children extends Model
{
    //

    protected $fillable=['name','birthday','myKID','gender','parents_id','therapist_id','children_pic'];
    protected $guarded = [];
    
    
    public function schedule()  {
        return $this->hasMany('AutisticCare\Schedule');
    }
    public function homework()  {
        return $this->hasMany('AutisticCare\Homework');
    }
    public function mother()  {
        return $this->belongsTo(User::class);
    }
}
