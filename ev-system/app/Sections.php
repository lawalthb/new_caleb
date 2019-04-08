<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    public function classme()
	{
		return $this->belongsTo('App\Classes','class_id');
	}
	public function teacher($id){
		$stu = User::where('id', $id)->where('role', 'teacher')->first();
		return $stu;
	}
	public function isclass($id){
		$stu = Classes::where('id', $id)->first();
		return $stu;
	}
}
