<?php

namespace AutisticCare;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class Schedule extends Model
{
    //
    protected $fillable = ['title','start_date','end_date', 'start_time', 'end_time', 'recurring'];
    public function goal()  {
        return $this->belongsTo(Goal::class);
    }
}
