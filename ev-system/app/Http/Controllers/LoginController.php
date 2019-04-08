<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use App\Parents;
use App\Student;
use App\Settings;
use App\Teacher;
use Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;
use Crypt;
use Hash;


class LoginController extends Controller
{
	public function change_skin($value)
	{
		setcookie("skin", $value, time() + (3600), "/");
		return back();
	}
	public function index()
	{
		$st = Settings::find(1);
		if ($st->page == 0) {			
			return view('welcome');
		}
		else
		{
			return view('front.default');
		}
	}

    public function login(Request $request)
    {
		$credentials = $request->only('email', 'password');
		$email = $request->get('email');
		$password = $request->get('password');
        if (Auth::attempt(array('email'=> $email, 'password' => $password))) {
            return redirect()->intended('dashboard');
		}
		else{
			return back();
		}
    }
    public function restore()
    {
    	ini_set('max_execution_time', 300);
		Artisan::call("migrate:refresh");
	
		Artisan::call("db:seed");
		\Session::flush();
        \Session::regenerate();
		$message =  trans('topbar_menu_lang.success');
		return redirect('/')->withMessage($message);
    }
}
