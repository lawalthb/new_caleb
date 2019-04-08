<?php
/*
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! PRODUCT NAME: 	EDUVELLA SCHOOL MANAGEMENT SYSTEM
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! AUTHOR:			MIXPEAL TECHNOLOGIES 
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! EMAIL:			mixpeal@gmail.com
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! COPYRIGHT:		RESERVED BY MIXPEAL TECHNOLOGIES
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
! WEBSITE:			http://eduvella.com
! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/
namespace App\Http\Controllers;

use App\Classes;
use App\Material;
use App\User;
use Input;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Redirect;

class TeacherController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
	public function study_material()
	{	
		if(!Auth::user()->permission('is_teacher'))
			return redirect('dashboard');
		$teachers = User::where('role', 'teacher')->get();
		$classes = Classes::all();
		$teacher_auth = Auth::user()->id;
		$materials = Material::orderBy('created_at','desc')->where('teacher_id', $teacher_auth)->paginate();
		return view('teacher.class.studymat')->with(compact(['classes','teachers','materials','teacher_auth']));
	}
	public function store_study_material(Request $request)
	{
		if(!Auth::user()->permission('is_teacher'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),
        ]);
        if ($validator->fails()) {
            return back();
        }
		$mats = new Material();
		$mats->class_id = $request->get('class_id');
		$mats->teacher_id = $request->get('teacher_id');
		$mats->title = $request->get('title');
		$mats->description = $request->get('description');
		$mats->date = $request->get('date');
		$file = $request->file('import_file');
		$name = str_slug($request->get('title'));
		if ($file) {
			$destinationPath = public_path().'/ev-assets/uploads/study-materials';
			$extension = $file->getClientOriginalExtension(); // getting image extension
			$fileName = rand(11111,99999).$name.'.'.$extension; // renameing image
			$request->file('import_file')->move($destinationPath, $fileName);
			$mats->file_name = $fileName; // upload path
			$mats->file_format = $extension;
			$mats->save();
			return back();
		}
	}
	public function update_study_material(Request $request)
	{
		if(!Auth::user()->permission('is_teacher'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
            'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
            'description' => array('Regex:/^[A-Za-z0-9 ]+$/'),

        ]);
         if ($validator->fails()) {
            return back();
        }
        $mats = Material::find($request->get('id'));
		$mats->class_id = $request->get('class_id');
		$mats->teacher_id = $request->get('teacher_id');
		$mats->title = $request->get('title');
		$mats->description = $request->get('description');
		$mats->date = $request->get('date');
        $message = 'Post updated successfully';
        $mats->save();
        return back()->withMessage($message);
        
    }
	public function destroy_study_material(Request $request, $id)
	{
		if(!Auth::user()->permission('is_teacher'))
			return redirect('dashboard');
		$rout = Material::find($id);
		//$rout->delete();
		$data['message'] = 'Post deleted Successfully';
		return back()->with($data);
	}
	
}
