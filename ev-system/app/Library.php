<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public function classname($in)
	{
		$messages = Classes::where('id',$in)->first();
		return $messages;
	}
}
