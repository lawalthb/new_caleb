<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\App;
use App\Attendance;
use App\Classes;
use App\Day;
use App\Dormitory;
use App\Exam;
use App\Expense;
use App\Mark;
use App\Material;
use App\Message;
use App\Notice;
use App\Invoice;
use App\Posts;
use App\PromotionHistory;
use App\Reply;
use App\Routine;
use App\School;
use App\Sections;
use App\Subject;
use App\User;
use Carbon\Carbon;

class ApiController extends Controller
{
	public function index()
	{
		$data = User::where('role', 'student')->get();
		return $data->toArray();
	}
	
	public function verifyToken($token, $secret)
	{
		$app = App::where('app_token', $token)->where('app_secret', $secret)->get();
		if($app && $app->count() > 0){
			return true;
		}
		else{
			return false;
		}
	}
    public function login(Request $request)
    {
		$app = App::where('app_token', $request->get('app_token'))->where('app_secret', $request->get('app_secret'))->doesntExist();
		if($app){
			return response()->json(['error' => 'no valid app credentials' ], 401);
		}
    	$email = $request->get('email');
		$password = $request->get('password');
		if($email && strlen($email) > 0){
			if(User::where('email', $email)->first()){
				if (Auth::attempt(array('email'=> $email, 'password' => $password))) {
					$user = Auth::user();
					$success['token'] =  $user->createToken('Eduvella mobile'. rand(0000, 9999))->accessToken;
					return response()->json(['success' => $success, 'user' => $user], 200);
				}
				else{
					return response()->json(['error' => 'email and password do not match' ], 401);
				}
			}
			else{
				return response()->json(['error' => 'email not found' ], 401);
			}
		}
		else{
			return response()->json(['error' => 'email field is required' ], 401);
		}
		
		
	}
	public function current_user()
	{
		$user = Auth::user();
		return response()->json([ 'user' => $user], 200);
	}
	public function view_students()
	{
		$students = User::where('role', 'student')->get();
		if($students && $students->count() > 0){
			return response()->json($students, 200);
		}
		else{
			return response()->json(['error' => '0 student found' ], 401);
		}
	}
	public function view_parent_students($id)
	{
		$students = User::where('role', 'student')->where('parent_id', $id)->get();
		if($students && $students->count() > 0){
			return response()->json($students, 200);
		}
		else{
			return response()->json(['error' => '0 student found' ], 401);
		}
	}
	public function view_classes()
	{
		
		$classes = Classes::all();
		if($classes && $classes->count() > 0){
			return response()->json($classes, 200);
		}
		else{
			return response()->json(['error' => '0 class found' ], 401);
		}
	}
	
	public function view_student_by_class($id)
	{
		
		$students = User::where('class_id', $id)->paginate(20);
		if($students && $students->count() > 0){
			return response()->json($students, 200);
		}
		else{
			return response()->json(['error' => '0 student found' ], 401);
		}
	}
	public function blogs()
	{
		
		$posts = Posts::paginate(10);
		if($posts && $posts->count() > 0){
			return response()->json($posts, 200);
		}
		else{
			return response()->json(['error' => '0 post found' ], 401);
		}
	}
	public function notifications()
	{
		
		$notifications = Notice::all();
		if($notifications && $notifications->count() > 0){
			return response()->json($notifications, 200);
		}
		else{
			return response()->json(['error' => '0 notification found' ], 401);
		}
	}
	public function teachers()
	{
		
		$teachers = User::where('role', 'teacher')->get();
		if($teachers && $teachers->count() > 0){
			return response()->json($teachers, 200);
		}
		else{
			return response()->json(['error' => '0 teacher found ' ], 401);
		}
	}
	public function parents()
	{
		
		$parents = User::where('role', 'parent')->get();
		if($parents && $parents->count() > 0){
			return response()->json($parents, 200);
		}
		else{
			return response()->json(['error' => '0 parent found' ], 401);
		}
	}
	public function subjects()
	{
		
		$subjects = Subject::all();
		if($subjects && $subjects->count() > 0){
			return response()->json($subjects, 200);
		}
		else{
			return response()->json(['error' => '0 subject found' ], 401);
		}
	}
	public function sections()
	{
		
		$sections = Sections::all();
		if($sections && $sections->count() > 0){
			return response()->json($sections, 200);
		}
		else{
			return response()->json(['error' => '0 section found' ], 401);
		}
	}
	public function hostels()
	{
		
		$dormitory = Dormitory::all();
		if($dormitory && $dormitory->count() > 0){
			return response()->json($dormitory, 200);
		}
		else{
			return response()->json(['error' => '0 hostel found' ], 401);
		}
	}
	public function schools()
	{
		
		
		$schools = School::all();
		if($schools && $schools->count() > 0){
			return response()->json($schools, 200);
		}
		else{
			return response()->json(['error' => '0 section found' ], 401);
		}
	}
	public function search_chat(Request $request)
    {
		$keyed = 0;
		$q = $request->get('search');
		$users = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('role','LIKE','%'.$q.'%')->get();
		foreach($users as $key => $user){
			if($user->id == $request->get('user_id')){
				unset($users[$key]);
			}
			if(Message::where('from', $user->id)->where('to', $request->get('user_id'))->exists()){
				unset($users[$key]);
			}
			else if(Message::where('to', $user->id)->where('from', $request->get('user_id'))->exists()){
				unset($users[$key]);
			}
		}
		return response()->json($users, 200);
	}
	public function messages($id)
	{
		$messages = Message::where('from', $id)->orWhere('to', $id)->orderBy('updated_at', 'DESC')->get();
		foreach($messages as $message){
			if($message->to != $id){
				$message->name =  User::find($message->to) ? User::find($message->to)->name : "Eduvella user";
				$message->image =  User::find($message->to) ? User::find($message->to)->image :null;
			}
			if($message->from != $id){
				$message->name =  User::find($message->from) ? User::find($message->from)->name : "Eduvella user";
				$message->image =  User::find($message->from) ? User::find($message->from)->image :null;
			}
			$reply = Reply::where('message_id', $message->id)->orderBy('created_at', 'DESC')->first();
			if($reply){
				$message->message = $reply->body;
				$message->replies = Reply::where('message_id', $message->id)->orderBy('created_at', 'ASC')->get();
			}
			else{
				$message->message = null;
			}
			$message->reply_count = Reply::where('message_id', $message->id)->where('author_id', "<>", $id)->where('active', 0)->get()->count();
		}

		return response()->json($messages, 200);
	}

	public function store_reply(Request $request)
    {
		if(!is_null($request->get('message_id'))){
			$modifyMessage = Message::find($request->get('message_id'));
			if($modifyMessage){
				$modifyMessage->updated_at = Carbon::now()->toDateTimeString();
				$modifyMessage->save();
			}
			$reply = new Reply();
			$reply->author_id = $request->get('author_id');
			$reply->body = $request->get('body');
			$reply->message_id = $request->get('message_id');
			if($reply->save()){
				$messages = Message::where('from', $request->get('author_id'))->orWhere('to', $request->get('author_id'))->orderBy('updated_at', 'DESC')->get();
				foreach($messages as $message){
					if($message->to != $request->get('author_id')){
						$message->name =  User::find($message->to) ? User::find($message->to)->name : "Eduvella user";
						$message->image =  User::find($message->to) ? User::find($message->to)->image :null;
					}
					if($message->from != $request->get('author_id')){
						$message->name =  User::find($message->from) ? User::find($message->from)->name : "Eduvella user";
						$message->image =  User::find($message->from) ? User::find($message->from)->image :null;
					}
					$reply = Reply::where('message_id', $message->id)->orderBy('created_at', 'DESC')->first();
					if($reply){
						$message->message = $reply->body;
						$message->replies = Reply::where('message_id', $message->id)->orderBy('created_at', 'ASC')->get();
					}
					else{
						$message->message = null;
					}
					$message->reply_count = Reply::where('message_id', $message->id)->where('author_id', "<>", $request->get('author_id'))->where('active', 0)->get()->count();
				}
				return response()->json($messages, 200);
			}
			else{
				return response()->json(['error' => 'cant store message' ], 401);
			}
		}
		else{
			$msg = Message::where('from', $request->get('author_id'))->where('to', $request->get('to_id'))->doesntExist();
			if($msg){
				$newMessage = new Message();
				$newMessage->to = $request->get('to_id');
				$newMessage->from = $request->get('author_id');
				$newMessage->save();
			}
			else{
				$newMessage = $msg;
			}
			if($newMessage){
				$reply = new Reply();
				$reply->author_id = $request->get('author_id');
				$reply->body = $request->get('body');
				$reply->message_id = $newMessage->id;
				if($reply->save()){
					$messages = Message::where('from', $request->get('author_id'))->orWhere('to', $request->get('author_id'))->orderBy('updated_at', 'DESC')->get();
					foreach($messages as $message){
						if($message->to != $request->get('author_id')){
							$message->name =  User::find($message->to) ? User::find($message->to)->name : "Eduvella user";
							$message->image =  User::find($message->to) ? User::find($message->to)->image :null;
						}
						if($message->from != $request->get('author_id')){
							$message->name =  User::find($message->from) ? User::find($message->from)->name : "Eduvella user";
							$message->image =  User::find($message->from) ? User::find($message->from)->image :null;
						}
						$reply = Reply::where('message_id', $message->id)->orderBy('created_at', 'DESC')->first();
						if($reply){
							$message->message = $reply->body;
							$message->replies = Reply::where('message_id', $message->id)->orderBy('created_at', 'ASC')->get();
						}
						else{
							$message->message = null;
						}
						$message->reply_count = Reply::where('message_id', $message->id)->where('author_id', "<>", $request->get('author_id'))->where('active', 0)->get()->count();
					}
					return response()->json($messages, 200);
				}
				else{
					return response()->json(['error' => 'cant store message' ], 401);
				}
			}
			
		}
		
	}

	public function friend_request(Request $request)
    {
		$from_id = $request->get('from_id');
		$to_id = $request->get('to_id');
		$message = Message::where('from', $from_id)->where('to', $to_id)->doesntExist();
		if($message){
			$message = Message::where('from', $to_id)->where('from', $to_id)->doesntExist();
			if($message){
				$message = new Message();
				$message->from = $from_id;
				$message->to = $to_id;
				$message->save();
				return response()->json($message, 200);
			}
			else{
				return response()->json(['error' => 'conversation already exists' ], 401);
			}
		}
		else{
			return response()->json(['error' => 'conversation already exists' ], 401);
		}
	}
	public function accept_request(Request $request)
    {
		$from_id = $request->get('from_id');
		$to_id = $request->get('to_id');
		$message = Message::where('from', $from_id)->where('to', $to_id)->first();
		if(!$message){
			$message = Message::where('from', $to_id)->where('to', $from_id)->first();
			if(!$message){
				return response()->json(['error' => 'conversation doesnt exists' ], 401);
			}
			else{
				$message->active = 1;
				$message->save();
				return response()->json($message, 200);
			}
		}
		else{
			$message->active = 1;
			$message->save();
			return response()->json($message, 200);
		}

	}
	public function seen_messages(Request $request)
    {
		$replies = Reply::where('message_id', $request->get('message_id'))->where('author_id',"<>",$request->get('author_id'))->get();
		if($replies && $replies->count() > 0){
			foreach($replies as $reply){
				$reply->active = 1;
				$reply->save();
			}
			return response()->json(['success' => 'messages marked as read' ], 200);
		}
		else{
			return response()->json(['error' => 'conversation does not exist' ], 401);
		}
	}

	public function select_attendance(Request $request)
    {
		$day = $request->get('day');
		$month = $request->get('month');
		$year = $request->get('year');
		$class_id = $request->get('class_id');
		$date =  $request->get('year') . "-" . $request->get('month') . "-" . $request->get('day');

		$students = User::where('class_id', $class_id)->get();
		if($students && $students->count() > 0){
			foreach($students as $student){
				$attendance = Attendance::where('student_id', $student->id)->where('date', $date)->first();
				$student->attendance = $attendance;
			}
			return response()->json($students, 200);
		}
		else{
			return response()->json(['error' => 'No student is found in selected class' ], 401);
		}
	}
	public function take_attendance(Request $request)
    {
		$data = $request->get('data');
		$date = $request->get('date');
		$class_id = $request->get('class_id');
		$students = User::where('class_id', $class_id)->get();
		if($students && $students->count() > 0){
			try{
				foreach($students as $key => $student){
					$attendance = Attendance::where('student_id', $student->id)->where('date', $date)->first();
					if($attendance && $attendance->count() > 0){
						$attendance->status = $data[$key] ? 1 : 0;
						$attendance->save();
					}
					else {
						$newAttendance = new Attendance;
						$newAttendance->date = $date;
						$newAttendance->student_id = $student->id;
						$newAttendance->status = $data[$key] ? 1 : 0;
						$newAttendance->save();
					}
				} 
				return response()->json(['success' => 'Attendance is marked' ], 200);
			}
			catch(Exception $e){
				return response()->json(['error' => $e->getMessage() ], 401);
			}
		}
		else{
			return response()->json(['error' => 'No student is found in selected class' ], 401);
		}
	}
	public function invoices(){
		$invoices = Invoice::all();
		if($invoices && $invoices->count() > 0){
			foreach($invoices as $invoice){
				$student = User::find($invoice->student_id);
				if($student){
					$invoice->student = $student;
				}
			}
			return response()->json($invoices, 200);
		}
		else{
			return response()->json(['error' => 'No invoice is found' ], 401);
		}
	}

	public function student_invoices($id){
		$invoices = Invoice::where('student_id', $id)->get();
		if($invoices && $invoices->count() > 0){
			foreach($invoices as $invoice){
				$student = User::find($invoice->stuident_id);
				if($student){
					$invoice->student = $student;
				}
			}
			return response()->json($invoices, 200);
		}
		else{
			return response()->json(['error' => 'No invoice is found' ], 401);
		}
	}
	public function expenses(){
		$expenses = Expense::all();
		if($expenses && $expenses->count() > 0){
			foreach($expenses as $expense){
				$student = User::find($expense->student_id);
				if($student){
					$expense->student = $student;
				}
			}
			return response()->json($expenses, 200);
		}
		else{
			return response()->json(['error' => 'No expense is found' ], 401);
		}
	}
	public function exams(){
		$exams = Exam::all();
		if($exams && $exams->count() > 0){
			return response()->json($exams, 200);
		}
		else{
			return response()->json(['error' => 'No exam is found' ], 401);
		}
	}
	public function select_mark(Request $request)
	{	
		$exam = $request->get('exam');
		$class = $request->get('class');
		$subject = $request->get('subject');
		if($exam && $class && $subject){
			$students = User::where('class_id', $class)->get();
			if($students && $students->count()){
				foreach ($students as $student) {
					$thisMark = Mark::where('student_id',$student->id)->where('subject_id', $subject)->where('exam_id', $exam)->first();
					$student->mark = $thisMark ? $thisMark->mark_obtained : '';
				}
				return response()->json([$students, $exam, $class, $subject], 200);
			}
			else {
				 return response()->json(['error' => 'No student is found in the selected class' ], 401);
			}
		}
		else {
		 	return response()->json(['error' => 'All fields are required' ], 401);
		}
	}
	public function submit_mark(Request $request)
	{
		$class_id = $request->get('class');
		$getStudents = User::where('class_id', $class_id)->get();
		if($getStudents && $getStudents->count() > 0){
			foreach($getStudents as $key => $eachStudent){
				$subject = $request->get('subject');
				$student = $eachStudent;
				$markSent = $request->get('data')[$key];
				$comment = '';
				$exam = $request->get('exam');
				$getmark = Mark::where('subject_id', $subject)->where('student_id', $student->id)->where('exam_id', $exam)->first();
				if(is_null($getmark)){
					$mark = new Mark();
					$mark->subject_id = $subject;
					$mark->class_id = $class_id;
					$mark->exam_id = $exam;
					$mark->mark_total = 100;
					$mark->comment = $comment;
					$mark->student_id = $student->id;
					$mark->mark_obtained = $markSent;
					$mark->save();
				}
				else{
					Mark::where('student_id',$student->id)->where('subject_id', $subject)->where('exam_id', $exam)->
					update(['mark_obtained' => $markSent,'comment' => $comment]);
				}
			}
			return response()->json(['success' => 'Exam is marked' ], 200);
		}
		else {
				return response()->json(['error' => 'No student found' ], 401);
		}
		
	}
	public function view_mark(Request $request){
		$exam = $request->get('exam');
		$student_id = $request->get('student_id');
		$marks = Mark::where('student_id', $student_id)->where('exam_id', $exam)->get();
		if($marks && $marks->count() > 0){
			$sum = 0;
			foreach ($marks as $mark) {
				$sum += $mark->mark_obtained;
				$subject = Subject::find($mark->subject_id);
				$mark->subject = $subject;
				$mark->grade_point = $mark->checkgrade($mark->mark_obtained);
			}
			$averageMark = $sum/$marks->count();
			return response()->json([$marks, $averageMark], 200);
		}
		else{
			return response()->json(['error' => '0 record found' ], 401);
		}
	}
	public function materials(Request $request){
		$materials = Material::where('class_id', $request->get('class_id'))->get();
		if($materials && $materials->count() > 0){
			return response()->json($materials, 200);
		}
		else{
			return response()->json(['error' => '0 material found' ], 401);
		}
	}
	public function get_routine(Request $request)
    {   
		$days = Day::all();
		if($days && $days->count() > 0){
			foreach($days as $day){
				$routines = Routine::where('day_id', $day->id)
								->where('class_id', $request->get('class_id'))
								->get();
				if($routines && $routines->count() > 0){
					foreach($routines as $routine){
						$subject = Subject::find($routine->subject_id);
						$routine->subjects = $subject;
					}
					$day->routines = $routines;
				}
			}
			return response()->json($days, 200);
		}
		else{
			return response()->json(['error' => 'no routine is found' ], 401);
		}
	}
	public function get_parent_routine(Request $request)
    {   
		$days = Day::all();
		if($days && $days->count() > 0){
			$user = User::find($request->get('student_id'));
			if($user){
				foreach($days as $day){
					$routines = Routine::where('day_id', $day->id)
									->where('class_id', $user->class_id)
									->get();
					if($routines && $routines->count() > 0){
						foreach($routines as $routine){
							$subject = Subject::find($routine->subject_id);
							$routine->subjects = $subject;
						}
						$day->routines = $routines;
					}
				}
				return response()->json($days, 200);
			}
			else{
				return response()->json(['error' => 'student not found' ], 401);
			}
		}
		else{
			return response()->json(['error' => 'no routine is found' ], 401);
		}
	}
	public function get_promotions(Request $request)
	{
		$promotions = PromotionHistory::where('student_id', $request->get('student_id'))->get();
		if($promotions && $promotions->count() > 0){
			foreach($promotions as $promotion){
				$promotion->from_class = Classes::find($promotion->from_class)->title;
				$promotion->to_class = Classes::find($promotion->to_class)->title;
			}
			return response()->json($promotions, 200);
		}
		else{
			return response()->json(['error' => 'no promotion history is found' ], 401);
		}
	}
	public function store_student(Request $request)
	{
		$the_id = User::all()->last()->id;
		$next_id = $the_id+1;
		$the_id = User::where('role', 'student')->get()->last()->id;
		$init = "EV".date('Y');
		$get_id = $the_id+1;
		if ($get_id<10) {
			$make_id = "000".$get_id;
		}
		elseif ($get_id>=10 && $get_id<100) {
			$make_id = "00".$get_id;
		}
		elseif ($get_id>=100 && $get_id<1000) {
			$make_id = "0".$get_id;
		}
		elseif ($get_id>=1000) {
			$make_id = "0".$get_id;
		}
		$next_id = $init.$make_id;


		$user = new User();
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->address = $request->get('address');
		$user->password = $request->get('password');
		$user->gender = $request->get('gender');
		$user->birthday = $request->get('birthday');
		$user->class_id = $request->get('class');
		$user->section_id = $request->get('section');
		$user->parent_id = $request->get('parent');
		$user->school_id = $request->get('school');
		$user->dormitory_id = $request->get('hostel');
		$user->role = 'student';
		$user->role_id = 3;
		$user->reg_no = $next_id;
		$file = $request->file('avatar');
		if($file){
			$destinationPath = public_path().'/ev-assets/uploads/avatars';
			$extension = $file->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).$request->get('name').'.'.$extension; // renameing image
			try{
				$request->file('avatar')->move($destinationPath, $fileName);
				$user->image = $fileName; // upload path
				$user->save();
				return response()->json($user, 200);
			}
			catch(Exception $e){
				return response()->json(['error' => $e->getMessage() ], 401);
			}	
		}
		else{
			$user->save();
			return response()->json($user, 200);
		}
		
	}
	
	public function edit_profile(Request $request)
	{
		$id = $request->input('user_id');
		$user = User::find($id);
		if($user && $user->count() > 0){
			$user->name = $request->get('name');
			$user->email = $request->get('email');
			$user->address = $request->get('address');
			$user->phone = $request->get('phone');
			$file = $request->file('avatar');
			if($file){
				$destinationPath = public_path().'/ev-assets/uploads/avatars';
				$extension = $file->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).$request->get('name').'.'.$extension; // renameing image
				try{
					$request->file('avatar')->move($destinationPath, $fileName);
					$user->image = $fileName; // upload path
					if($request->get('currentPassword') && $request->get('newPassword') && $request->get('repeatPassword')){
						if (password_verify($request->get('currentPassword'),$user->password)) {
							if($request->get('newPassword') == $request->get('repeatPassword')){
								$user->password = $request->get('newPassword');
								$user->save();
								return response()->json($user, 200);
							}
							else{
								return response()->json(['error' => 'confirm password do not match new password' ], 401);
							}
						}
						else{
							return response()->json(['error' => 'current password is not correct' ], 401);
						}
					}
					else{
						$user->save();
						return response()->json($user, 200);
					}
				}
				catch(Exception $e){
					return response()->json(['error' => $e->getMessage() ], 401);
				}	
			}
			else{
				if($request->get('currentPassword') && $request->get('newPassword') && $request->get('repeatPassword')){
					if (password_verify($request->get('currentPassword'),$user->password)) {
						if($request->get('newPassword') == $request->get('repeatPassword')){
							$user->password = $request->get('newPassword');
							$user->save();
							return response()->json($user, 200);
						}
						else{
							return response()->json(['error' => 'confirm password do not match new password' ], 401);
						}
					}
					else{
						return response()->json(['error' => 'current password is not correct' ], 401);
					}
				}
				else{
					$user->save();
					return response()->json($user, 200);
				}
			}
		}
		else{
			return response()->json(['error' => 'user not found' ], 401);
		}
        
        
    }
}
