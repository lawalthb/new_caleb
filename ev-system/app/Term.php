<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public function academic_session()
    {
        return $this->belongsTo('App\AcademicSession','session_id');
    }
}
