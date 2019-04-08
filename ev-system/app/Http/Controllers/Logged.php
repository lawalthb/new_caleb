<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use App\Classes;
use App\Material;
use App\Notice;
use App\Attendance;
use Auth;
use DB;
use Charts;

use Illuminate\Http\Request;

class Logged extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function index()
    {
        $posts = Posts::orderBy('created_at','desc')->paginate(4);
    	$classes = Classes::orderBy('created_at','asc')->paginate(4);
        $materials = Material::count();
        $notices = Notice::orderBy('created_at','asc')->paginate(3);
    	$authe = Auth::user();
        $att = Attendance::all();
        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                        ->where('role', 'student')
                        ->get();
    	return view('home')->with(compact(['authe','posts','materials','notices','classes','att', 'users']));
    }
}
