<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	
	protected $guarded = [];
	
	
	public function routines()
    {
        return $this->hasMany('App\Routine','subject_id');
    }
	
	
    public function classname($in)
	{
		$messages = Classes::where('id',$in)->first();
		return $messages;
	}
	public function teacher()
	{
		return $this->belongsTo('App\User','teacher_id');
	}
	public function class_name()
	{
		return $this->belongsTo('App\Classes','class_id');
	}
}
