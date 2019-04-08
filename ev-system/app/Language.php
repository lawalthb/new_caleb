<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {

	//posts table in database
	use \Waavi\Translation\Translatable\Trait;
	    protected $translatableAttributes = ['title', 'text'];

}
