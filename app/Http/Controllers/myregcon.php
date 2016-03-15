<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Carbon\Carbon;
use Request;
class myregcon extends Controller {

   public function show($id)
   {
        $user=User::findOrFail($id);

       return view('myreg',compact('user'));
   }

    public function create()
    {
        return view('myreg');
    }
public function store()
{
        $input=Request::all();
    $input['published_at']=Carbon::now();
    //$input=Request::get('email');
    //$input=Request::get('password');
    //$input=Request::get('usertype');
    $user=new user;
    $user->name=$input['name'];
    $user->email=$input['email'];
    $user->password=$input['password'];
    $user->usertype=$input['usertype'];
    $user->save();
    return redirect('myreg');
}

}
