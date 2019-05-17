<?php

namespace AutisticCare;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    //
    protected $table = 'homeworks';

    protected $fillable = ['title','due','description', 'step_1', 'step_2', 'step_3'];
    public function children()  {
        return $this->belongsTo(Children::class);
    }
}
