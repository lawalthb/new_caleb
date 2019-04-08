<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
   
    public function term()
    {
        return $this->belongsTo('App\Term','term_id');
    }
}
