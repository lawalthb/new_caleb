<?php

namespace App\Http\Controllers;

use App\User;
use App\Classes;
use App\Invoice;
use App\Payment;
use App\Settings;
use App\Routine;
use App\Exam;
use App\Mark;
use App\Subject;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Redirect;
/*
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! PRODUCT NAME:     EDUVELLA SCHOOL MANAGEMENT SYSTEM
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! AUTHOR:           MIXPEAL TECHNOLOGIES 
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! EMAIL:            mixpeal@gmail.com
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! COPYRIGHT:        RESERVED BY MIXPEAL TECHNOLOGIES
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! WEBSITE:          http://eduvella.com
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/
class ParentController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function show_payment($id)
    {   
        if(!Auth::user()->permission('is_parent'))
			return redirect('dashboard');
        $teachers = User::where('role', 'teacher')->get();
        $classes = Classes::all();
        $invoices = Invoice::all();
        $teacher_auth = Auth::user()->id;
        $payment = Payment::orderBy('created_at','desc')->where('student_id', $id)->paginate(5);
        return view('parent.payment')->with(compact(['classes','teachers','payment','teacher_auth','invoices']));
    }
    // display subjects for classes
	public function subject_show($id)
	{	
        if(!Auth::user()->permission('is_parent'))
			return redirect('dashboard');
        $classes = Classes::all();
		$showclasses = Classes::where('id',$id)->first();
		$auth = Auth::user();
		$settings = Settings::find(1);
		if($showclasses)
		{
			if($showclasses->active == false)
				return redirect('/')->withErrors('requested page not found');
			$subjects = $showclasses->subject()->orderBy('created_at','desc')->paginate(5);	
		}
		return view('admin.class.showsubject')->with(compact(['settings','subjects','showclasses','auth','classes']));
    }
    public function show_routine($id)
    {   
        if(!Auth::user()->permission('is_parent'))
			return redirect('dashboard');
        $classes = Classes::orderBy('created_at','desc')->paginate();
        $routine = Routine::all();
        $id = $id;
        $student = User::where('role', 'student')->where('id',$id)->first();
        return view('parent.routine.class_routine')->with(compact(['routine','classes','id','student']));
    }
    public function show_mark($id)
    {
        if(!Auth::user()->permission('is_parent'))
			return redirect('dashboard');
        $exams = Exam::all();
        $marks = Mark::all();
        $subjects = Subject::all();
        $marker = Mark::where('student_id', $id)->orderBy('created_at','desc')->paginate();
        $id = $id;
        return view('parent.exam.mark')->with(compact(['exams','subjects','marks','marker','id']));
    }
    public function show_submark($id,$exam)
    {
        if(!Auth::user()->permission('is_parent'))
			return redirect('dashboard');
        $exams = Exam::all();
        $marks = Mark::all();
        $subjects = Subject::all();
        $marker = Mark::where('student_id', $id)->where('exam_id', $exam)->orderBy('created_at','desc')->paginate();
        $id = $id;
        $examm = $exam;
        return view('parent.exam.marksub')->with(compact(['exams','subjects','marks','marker','id','examm']));
    }

}
