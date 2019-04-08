<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	//comments table in database
	protected $guarded = [];
	
	// user who commented
	public function students()
	{
		return $this->hasMany('App\User','class_id');
	}
	public function subject()
	{
		return $this->hasMany('App\Subject','class_id');
	}
	public function teacher()
	{
		return $this->belongsTo('App\User','teacher_id');
	}
	public function class_name()
	{
		return $this->belongsTo('App\Classes','class_id');
	}

	public function class_id()
    {
        return $this->hasMany('App\Routine','class_id');
    }
    public function sections()
    {
        return $this->hasMany('App\Sections','class_id');
    }
	
	public function post()
	{
		return $this->belongsTo('App\Posts','on_post');
	}
	public function student($id){

		$stu = User::where('class_id', $id)->where('role', 'student');
		return $stu;
	}
	
    //
}
