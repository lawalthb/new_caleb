<?php
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
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Classes;
use App\CATest;
use App\Exam;
use App\Invoice;
use App\Material;
use App\Mark;
use App\Payment;
use App\Routine;
use App\School;
use App\Subject;
use App\Term;
use App\Test;
use App\TestQuestion;
use App\TestResult;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use PDF;

class StudentController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    // display subjects for classes
    public function subject_show($id)
    {   
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $classes = Classes::orderBy('created_at','desc')->where('id',$id)->get();
        $showclasses = Classes::where('id',$id)->first();
        $auth = Auth::user();
        $settings = Settings::find(1);

        if($showclasses)
        {
            if($showclasses->active == false)
                return redirect('student/')->withErrors('requested page not found');
            $subjects = $showclasses->subject()->orderBy('created_at','asc')->paginate(5); 
        }
        else 
        {
            return redirect('student/')->withErrors('requested page not found');
        }
        return view('student.showsubject')->with(compact(['settings','subjects','showclasses','auth','classes']));
    }
    public function show_routine($id)
    {   
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $class = Classes::where('id',$id)->first();
        $classed = Classes::first();
        $cla = Classes::first();
        $routines = Routine::where('day_id', 1)->orderBy('created_at','desc')->paginate(5);
        $title = 'Latest Posts';
        $rts1 = $classed->class_id->where('day_id', 1);
        $auth = Auth::user();
        $settings = Settings::find(1);  
        $dab = $rts1->first();
        
        return view('student.class.class_routine')->with(compact(['routines','settings','class','classed','auth','rts1','dab']));
    }
    public function study_material()
    {   
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $teachers = User::where('role', 'teacher')->get();
        $classes = Classes::all();
        $teacher_auth = Auth::user()->class_id;
        $materials = Material::orderBy('created_at','desc')->where('class_id', $teacher_auth)->paginate();
        return view('student.class.studymat')->with(compact(['classes','teachers','materials','teacher_auth']));
    }
    public function show_payment()
    {   
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $teachers = User::where('role', 'teacher')->get();
        $classes = Classes::all();
        $invoices = Invoice::all();
        $teacher_auth = Auth::user()->id;
        $payment = Payment::orderBy('created_at','desc')->where('student_id', $teacher_auth)->paginate(5);
        return view('student.class.payment')->with(compact(['classes','teachers','payment','teacher_auth','invoices']));
    }
    public function show_mark($id)
    {
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $exams = Exam::all();
        $marks = Mark::all();
        $subjects = Subject::all();
        $marker = Mark::where('student_id', $id)->orderBy('created_at','desc')->paginate();
        $id = $id;
        return view('student.exam.mark')->with(compact(['exams','subjects','marks','marker','id']));
    }
    public function view_mark(Request $request)
    {
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $student = Auth::user();
        $term = Term::find($request->get('term_id'));
        $class = Classes::find(Auth::user()->class_id);
        $ca_test = CATest::where('term_id', $request->get('term_id'))->where('student_id', $student->id)->get();
        if($term){
            if($ca_test && $ca_test->count() > 0){
                $teacher = User::find($class->teacher_id);
                $get_school_admin = School::find(Auth::user()->school_id);
                $subjects = Subject::where('class_id', $class->id)->get();
                if($subjects){
                    $marks = CATest::where('term_id', $request->get('term_id'))->where('student_id', $student->id)->get();
                    $classmates = User::where('role', 'student')->where('class_id', $class->id)->get();
                    $students = User::where('role', 'student')->where('class_id', $class->id)->get();
                    foreach ($students as $key => $value) {
                        $test1_subject = 0; 
                        $test2_subject = 0; 
                        foreach ($subjects as $idx => $subject) {
                            $test_holder = CATest::where('term_id', $request->get('term_id'))->where('student_id', $value->id)->where('subject_id', $subject->id)->first();
                            $test1_subject+=$test_holder ? $test_holder->first_a+$test_holder->first_b+$test_holder->first_c : 0;
                            $test2_subject+=$test_holder ? $test_holder->second : 0;
                        }
                        $value->f_test = $test1_subject;
                        $value->s_test = $test2_subject;
                    }
                    foreach ($students as $key => $value) {
                        $value->all_sum = $value->s_test+$value->f_test;
                    }
                    $students = collect($students)->sortByDesc('all_sum');
                    $positionExam1 = array();
                    foreach ($students as $cl => $classmat) {
                        $positionExam1[] = $classmat->all_sum . '+'. $classmat->id ;
                    }
                    $positionExam3 = array();
                    foreach ($positionExam1 as $key => $value) {
                        $newExp = explode('+', $value);
                        $positionExam3[] = $newExp[0] . '+' . $key . '+' . $newExp[1];
                    }
                    $all_position = "";
                    foreach ($positionExam3 as $kk => $vv) {
                        $all_position .= $vv."*";
                    }
                    $exam_position = "";
                    $newValue = explode('*', $all_position);
                    foreach ($newValue as $kkk => $val) {
                        $newExps = explode('+', $val);
                        if(isset($newExps[2]) && Auth::id() == $newExps[2]){
                            $exam_position = $newExps[1];
                        }
                    }
                    return view('prints.spreadsheet-test')->with(compact(['get_school_admin','student', 'term', 'subjects', 'ca_test', 'class', 'teacher', 'marks', 'classmates', 'students', 'exam_position', 'all_position']));
                }
                else{
                    $message =  'Sorry, no subject in your class';
                    return back()->withMessage($message);
                }
            }
            else{
                $message =  'No result for selected term';
                return back()->withMessage($message);
            }
        }
        else{
            $message =  'all fields are required';
            return back()->withMessage($message);
        }
    }

    public function show_exam_result($id)
    {
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $exams = Exam::all();
        $marks = Mark::all();
        $subjects = Subject::all();
        $marker = Mark::where('student_id', $id)->orderBy('created_at','desc')->paginate();
        $id = $id;
        return view('student.exam.exam-result')->with(compact(['exams','subjects','marks','marker','id']));
    }
    public function view_exam_result(Request $request)
    {
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
		$student = Auth::user();
        $term = Term::find($request->get('term_id'));
        $class = Classes::find(Auth::user()->class_id);
        $ca_test = CATest::where('term_id', $request->get('term_id'))->where('student_id', $student->id)->get();
        if($term){
            $student->mark = Mark::where('student_id', $student->id)->where('term_id', $request->get('term_id'))->get();
            if($student->mark && $student->mark->count() > 0){
                $teacher = User::find($class->teacher_id);
                $exam = Exam::where('term_id', $request->get('term_id'))->first();
                if($exam){
                    $marks = Mark::where('exam_id', $exam->id)->where('student_id', $student->id)->orderBy('mark_obtained', 'DESC')->get();
                    $get_school_admin = School::find(Auth::user()->school_id);
                    $subjects = Subject::where('class_id', $class->id)->get();
                    if($exam){
                        $classmates = User::where('role', 'student')->where('class_id', $class->id)->get();

                        $students = User::where('role', 'student')->where('class_id', $class->id)->get();
                        $get_subject_mark = Mark::where('term_id', $request->get('term_id'))->where('class_id', $class->id);

                        foreach ($students as $key => $value) {
                            $mark_subject = 0; 
                            foreach ($subjects as $idx => $subject) {
                                $mark_subject+=Mark::where('student_id', $value->id)->where('term_id', $request->get('term_id'))->where('subject_id', $subject->id)->first() ? Mark::where('student_id', $value->id)->where('term_id', $request->get('term_id'))->where('subject_id', $subject->id)->first()->mark_obtained : 0;
                            }
                            $value->mark = $mark_subject;
                        }
                        foreach ($students as $key => $value) {
                            $test1_subject = 0; 
                            $test2_subject = 0; 
                            foreach ($subjects as $idx => $subject) {
                                $test_holder = CATest::where('term_id', $request->get('term_id'))->where('student_id', $value->id)->where('subject_id', $subject->id)->first();
                                $test1_subject+=$test_holder ? $test_holder->first_a+$test_holder->first_b+$test_holder->first_c : 0;
                                $test2_subject+=$test_holder ? $test_holder->second : 0;
                            }
                            $value->f_test = $test1_subject;
                            $value->s_test = $test2_subject;
                        }
                        foreach ($students as $key => $value) {
                            $value->all_sum = $value->s_test+$value->f_test+$value->mark;
                        }
                        $students = collect($students)->sortByDesc('all_sum');
                        $positionExam1 = array();
                        foreach ($students as $cl => $classmat) {
                            $positionExam1[] = $classmat->all_sum . '+'. $classmat->id ;
                        }
                        $positionExam3 = array();
                        foreach ($positionExam1 as $key => $value) {
                            $newExp = explode('+', $value);
                            $positionExam3[] = $newExp[0] . '+' . $key . '+' . $newExp[1];
                        }
                        $all_position = "";
                        foreach ($positionExam3 as $kk => $vv) {
                            $all_position .= $vv."*";
                        }
                        $exam_position = "";
                        $newValue = explode('*', $all_position);
                        foreach ($newValue as $kkk => $val) {
                            $newExps = explode('+', $val);
                            if(isset($newExps[2]) && Auth::id() == $newExps[2]){
                                $exam_position = $newExps[1];
                            }
                        }
                        //$pdf = PDF::loadView('prints.spreadsheet-exam', compact('get_school_admin','students', 'term', 'subjects', 'ca_test', 'class', 'teacher'));
                        //return $pdf->stream('spreadsheet.pdf');
                        return view('prints.spreadsheet-exam')->with(compact(['get_school_admin','student', 'term', 'subjects', 'ca_test', 'class', 'teacher', 'marks', 'classmates', 'students', 'exam_position', 'all_position']));
                    }
                    else{
                        $message =  'Sorry, no subject in your class';
                        return back()->withMessage($message);
                    }
                }
                else{
                    $message =  'No exam is related to the selected term';
                    return back()->withMessage($message);
                }
            }
            else{
                $message =  'No result for selected term';
                return back()->withMessage($message);
            }
        }
        else{
            $message =  'all fields are required';
            return back()->withMessage($message);
        }
    }
    public function show_test()
    {   
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $tests = Test::orderBy('created_at','asc')->paginate();
        return view('student.online_test.showtest')->with(compact(['tests']));
    }
    public function start_test($id)
    {   
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $questions = TestQuestion::orderBy('created_at','asc')->where('test_id',$id)->paginate();
        $id = $id;
        $test = Test::find($id);
        $res = TestResult::where('student_id',Auth::user()->id)->where('test_id',$id)->first();
        if($test->redo != 6){
            if($res){
            if ($res->counter > $test->redo) {
                return redirect('student/online_test');
            }
            }
        }
        return view('student.online_test.questions')->with(compact(['questions','id','test']));
    }
    public function store_test(Request $request)
    {
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $quest = TestQuestion::orderBy('created_at','asc')->where('test_id',$request->get('test_id'))->paginate();
        $sum = 0;
        foreach ($quest as $key => $value) {
          if ($request->get($key+1)) {
            if ($request->get($key+1) == $value->correct_answer) {
               $sum = $sum + 1;
              }
          }
        }
        $getdone = TestResult::where('student_id',$request->get('student_id'))->where('test_id',$request->get('test_id'))->first();
        if (!$getdone) {
            $test = new TestResult();
            $test->student_id = $request->get('student_id');
            $test->test_id = $request->get('test_id');
            $test->counter = 1;
            $test->score = $sum;
            $test->save();
        }
        else
        {
            $test = TestResult::where('student_id',$request->get('student_id'))->where('test_id',$request->get('test_id'))->first();
            $test->student_id = $request->get('student_id');
            $test->test_id = $request->get('test_id');
            $test->counter = $getdone->counter+1;
            $test->score = $sum;
            $test->save();
        }
        $stu = $auth = Auth::user();
        return redirect('student/test_result/'.$stu->id);
    }
    public function test_result($id)
    {   
        if(!Auth::user()->permission('is_student'))
			return redirect('dashboard');
        $results = TestResult::orderBy('created_at','asc')->where('student_id',$id)->paginate();
        $id = $id;
        return view('student.online_test.test_result')->with(compact(['results','id']));
    }
}
