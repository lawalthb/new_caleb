<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{	//comments table in database
	protected $guarded = [];
	
	// user who commented
	public function from()
	{
		return $this->belongsTo('App\Teacher','from');
	}
	
	public function to_student()
	{
		return $this->belongsTo('App\Student','to');
	}
    //
}
