<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function check($id){

		$grade = Grade::all();
		foreach ($grade as $key => $value) {
			if ($id >= $value->mark_from   &&  $id <= $value->mark_upto) {
				return $value->name;
			}
		}
	}
	public function checkgrade($id){

		$grade = Grade::all();
		foreach ($grade as $key => $value) {
			if ($id >= $value->mark_from   &&  $id <= $value->mark_upto) {
				return $value->grade_point;
			}
		}
	}
	public static function checkgradeSpreadsheet($id){

		$grade = Grade::all();
		foreach ($grade as $key => $value) {
			if ($id >= $value->mark_from   &&  $id <= $value->mark_upto) {
				return $value->grade_point;
			}
		}
	}
	public static function checkgradeSpreadsheetName($id){

		$grade = Grade::all();
		foreach ($grade as $key => $value) {
			if ($id >= $value->mark_from   &&  $id <= $value->mark_upto) {
				return $value->name;
			}
		}
	}

	public static function checkgradeSpreadsheetTest($value){
		if($value < 1){
			return 'F';
		}
		elseif($value >= 1 && $value < 5){
			return 'E';
		}
		elseif($value >= 5 && $value < 10){
			return 'D';
		}
		elseif($value >= 10 && $value < 15){
			return 'C';
		}
		elseif($value >= 15 && $value < 18){
			return 'B';
		}
		elseif($value >= 18){
			return 'A';
		}
	}

	public static function checkgradeSpreadsheetMidTermTestName($value){
		if($value < 1){
			return 'Very Poor';
		}
		elseif($value >= 1 && $value < 5){
			return 'Poor';
		}
		elseif($value >= 5 && $value < 10){
			return 'Fair';
		}
		elseif($value >= 10 && $value < 15){
			return 'Average';
		}
		elseif($value >= 15 && $value < 18){
			return 'Good';
		}
		elseif($value >= 18){
			return 'Excellent';
		}
	}


	public static function positionLetter($value){
		if($value == 1 || substr($value, 0, 1).substr($value,-1) == 1){
			echo 'st';
		}
		elseif($value == 2 || substr($value, 0, 1).substr($value,-1) == 2){
			echo 'nd';
		}
		elseif($value == 3 || substr($value, 0, 1).substr($value,-1) == 3){
			echo 'rd';
		}
		else{
			echo 'th';
		}
	}

	public function subject($id){

        $stu = Subject::where('id', $id)->find($id);
        return $stu;
    }
    public function classname($id){

        $stu = Classes::where('id', $id)->find($id);
        return $stu;
    }
}
