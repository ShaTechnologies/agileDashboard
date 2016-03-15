<?php namespace App\Http\Controllers;
use App\User;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$x=User::all();
		//$type = User::table('users')->where('usertype', 'developer')->get();
		//$type=$x->usertype;
		//$type = User::table('users')->where('name','kent')->get();
		return view('auth/login');
	}
	public function showloginpage()
	{
		//$x=User::all();
		//$type = User::table('users')->where('usertype', 'developer')->get();
		//$type=$x->usertype;
		//$type = User::table('users')->where('name','kent')->get();
		//$users=User::all();
		//$users=User::all();
		//return view('auth/login')->with('users',$users);
		$temp=User::all();
		$data=array('users'=>$temp);
		return view('auth/login',$data);
	}

}
