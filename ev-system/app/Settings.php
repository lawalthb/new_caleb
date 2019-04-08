<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public function change()
    {
    	$st = Settings::find(1);
	    $st->page = 1;
	    $st->save();
    }
}
