<?php

namespace AutisticCare;

use Illuminate\Database\Eloquent\Model;

class TherapyReport extends Model
{
    //
    protected $table = 'therapy_reports';

    public function children()  {
        return $this->belongsTo(Children::class);
    }

}
