<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Url;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class TeacherController extends Controller
{
	public function dashboard()
	{
		$teacher = session()->get('teacher');
        if(isset($teacher->id) && $teacher->id != '')
        {
			return view('teacher/dashboard');
		}else{
            return redirect('adminlogin');
        }
	}

	public function allteacher()
	{
		$get_teachers = '';
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
			$get_teachers = DB::table('users')->where(['type'=>2])->get();

			return view('teacher/allteacher', compact('get_teachers'));
		}else{
            return redirect('adminlogin');
        }	
	}

	public function addteacher()
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
			return view('teacher/addteacher');
		}else{
            return redirect('adminlogin');
        }
	}

	public function insertteacher(Request $request)
	{
		$first_name = $request->first_name;
		$last_name = $request->last_name;
		$email = $request->email;
		$password = Hash::make($request->password);
		$confirmpassword = $request->confirmpassword;
		$type = 2;

		if($request->hasFile('image'))
        {
        	$image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
         	$destinationPath = public_path('/user');
         	$image->move($destinationPath, $name);

        }

        $user = DB::table('users')->where(['email'=>$email])->count();

        if($user == 1)
        {
        	return redirect()->route('teacher/addteacher')->with('error', 'Email already register please use different email id!');
        }else{
	        $course =  DB::table('users')->insert(['first_name'=>$first_name,'last_name'=>$last_name,'image'=>$name,'email'=>$email,'type'=>$type,'status'=>1,'password'=>$password,'created_at'=>NOW(),'updated_at'=>NOW()]);

	        return redirect()->route('teacher/allteacher')->with('success', 'Teacher successfully inserted!');
	    }
	}

	public function editteacher($id)
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
			$get_teacher = DB::table('users')->where(['id'=>$id])->first();
			return view('teacher/editteacher', compact('get_teacher'));
		}else{
            return redirect('adminlogin');
        }	
	}

	public function teacherstatus(Request $request)
	{
		$teacher_id = $request->teacher_id;
        $status_id = $request->status_id;

        if($status_id == 0)
            $statusid = $status_id;
        else
            $statusid = $status_id;

        DB::table('users')
        ->where('id', $teacher_id)
        ->update(['status' => $statusid]);

        echo $statusid;
        die();
	}

	public function deletedteachers(Request $request)
	{
		$id = $request->id;

        DB::table('users')->where(['id'=>$id])->delete();
        echo '1';
        die();
	}

	public function updateteacher(Request $request)
	{
		$first_name = $request->first_name;
		$last_name = $request->last_name;
		$id = $request->id;
		

		if($request->hasFile('image'))
        {
        	$image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
         	$destinationPath = public_path('/user');
         	$image->move($destinationPath, $name);

        }else{
        	 $name = $request->imageold;
        }

        DB::table('users')
        ->where('id', $id)
        ->update(['first_name' => $first_name,'last_name'=>$last_name,'image'=>$name,'updated_at'=>NOW()]);

        return redirect()->route('teacher/allteacher')->with('success', 'Teacher Successfully updated! ');
	}
}