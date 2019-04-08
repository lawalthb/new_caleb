<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function classes($id){

		$stu = Classes::where('id', $id)->find($id);
		return $stu;
	}
}
