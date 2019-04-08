<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function subject($in)
	{
		$messages = Subject::where('id',$in)->first();
		return $messages;
	}
	public function check_redo($in)
	{
		if ($in == 0) {
			return "Not Allowed";
		}
		elseif ($in == 1) {
			return "Allow Once";
		}
		elseif ($in == 2) {
			return "Allow Twice";
		}
		elseif ($in == 3) {
			return "Allow Three Times";
		}
		elseif ($in == 4) {
			return "Allow Four Times";
		}
		elseif ($in == 5) {
			return "Allow Five Times";
		}
		return "Always Allow";
	}
}
