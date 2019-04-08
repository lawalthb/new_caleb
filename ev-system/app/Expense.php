<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

    public function categories($id)
    {
		$stu = ExpenseCategory::where('id', $id)->first();
		return $stu;
	}
}
