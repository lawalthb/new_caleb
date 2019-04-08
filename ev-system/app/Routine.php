<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    public function subject()
	{
		return $this->belongsTo('App\Subject','subject_id');
	}
	public function classname($in)
	{
		$messages = Classes::where('id',$in)->first();
		return $messages;
	}
}
