<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Url;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class AdminController extends Controller
{
	public function adminlogin()
	{
		return view('admin/login');
	}

	public function addlogin(Request $request)
	{
		$email = $request->email;
		$password = $request->password;

		if (Auth::attempt(['email' => $email, 'password' => $password]))
       	{
        
            $user = DB::table('users')->where(['email'=>$email])->first();
       
            if($user->type == 0)
            {
                Session::put('admin', $user);
                return redirect('admin/dashboard');
            }else if($user->type == 2 && $user->status == 1 )
            {
            	Session::put('teacher', $user);
                return redirect('teacher/dashboard');
            }else {
            	return back()->with('error','Please contact administrator active your account!');
            }
 		}else{
 		
            return back()->with('error','Email and password does not include please use different email and password!');
          
       	}
	}

	public function dashboard()
	{
        $admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
		    return view('admin/dashboard');
        }else{
            return redirect('adminlogin');
        }
	}

    public function logout()
    {
        Session::flush();
        return redirect('adminlogin');
    }


}