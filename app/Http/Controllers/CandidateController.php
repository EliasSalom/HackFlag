<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Url;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class CandidateController extends Controller
{
	public function allcandidate()
	{
		$teacher = session()->get('teacher');
        if(isset($teacher->id) && $teacher->id != '')
        {
			$get_candidates = DB::table('users')->where(['type'=>1])->orderBy('id','desc')->get();
			return view('candidate/allcandidate', compact('get_candidates'));
		}else{
            return redirect('adminlogin');
        }
	}

	public function addcandidate()
	{
		$teacher = session()->get('teacher');
        if(isset($teacher->id) && $teacher->id != '')
        {
        	$get_classSection = DB::table('class')->get();
			return view('candidate/addcandidate', compact('get_classSection'));
		}else{
            return redirect('adminlogin');
        }
	}

	public function insertcandidate(Request $request)
	{
		$first_name = $request->first_name;
		$last_name = $request->last_name;
		$email = $request->email;
		$assign_class = $request->assign_class;
		$password = Hash::make($request->password);
		$confirmpassword = $request->confirmpassword;
		$type = 1;

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
        	return redirect()->route('candidate/addcandidate')->with('error', 'Email already register please use different email id!');
        }else{
	        $course =  DB::table('users')->insert(['first_name'=>$first_name,'last_name'=>$last_name,'image'=>$name,'email'=>$email,'assign_class'=>$assign_class,'type'=>$type,'status'=>1,'password'=>$password,'created_at'=>NOW(),'updated_at'=>NOW()]);

	        return redirect()->route('candidate/allcandidate')->with('success', 'Candidate successfully inserted!');
	    }
	}

	public function insertadmincandidate(Request $request)
	{
		$first_name = $request->first_name;
		$last_name = $request->last_name;
		$email = $request->email;
		$assign_class = $request->assign_class;
		$password = Hash::make($request->password);
		$confirmpassword = $request->confirmpassword;
		$type = 1;

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
        	return redirect()->route('candidate/adminaddcandidate')->with('error', 'Email already register please use different email id!');
        }else{
	        $course =  DB::table('users')->insert(['first_name'=>$first_name,'last_name'=>$last_name,'image'=>$name,'email'=>$email,'assign_class'=>$assign_class,'type'=>$type,'status'=>1,'password'=>$password,'created_at'=>NOW(),'updated_at'=>NOW()]);

	        return redirect()->route('candidate/candidatedetail')->with('success', 'Candidate successfully inserted!');
	    }
	}

	public function candidatestatus(Request $request)
	{
		$candidate_id = $request->candidate_id;
        $status_id = $request->status_id;

        if($status_id == 0)
            $statusid = $status_id;
        else
            $statusid = $status_id;

        DB::table('users')
        ->where('id', $candidate_id)
        ->update(['status' => $statusid]);

        echo $statusid;
        die();
	}

	public function deletedcandidate(Request $request)
	{
		$id = $request->id;

        DB::table('users')->where(['id'=>$id])->delete();
        echo '1';
        die();
	}

	public function editcandidate($id)
	{
		$teacher = session()->get('teacher');
        if(isset($teacher->id) && $teacher->id != '')
        {
			$get_candidate = DB::table('users')->where(['id'=>$id])->first();
			return view('candidate/editcandidate', compact('get_candidate'));
		}else{
            return redirect('adminlogin');
        }
	}

	public function updatecandate(Request $request)
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

        return redirect()->route('candidate/allcandidate')->with('success', 'Candidate Successfully updated! ');
	}


	public function adminupdatecandate(Request $request)
	{
		$first_name = $request->first_name;
		$last_name = $request->last_name;
		$assign_class = $request->assign_class;
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
        ->update(['first_name' => $first_name,'last_name'=>$last_name,'image'=>$name, 'assign_class'=> $assign_class, 'updated_at'=>NOW()]);

        return redirect()->route('candidate/candidatedetail')->with('success', 'Candidate Successfully updated! ');
	}

	public function candidatedetail()
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
			$get_candidates = DB::table('users')
			->leftJoin('class', 'users.assign_class', '=', 'class.id')
			->where(['type'=>1])
			->orderBy('users.id','desc')
			->select('users.*', 'class.*', 'users.id as users_id')
			->get();
/*
			$get_questions = DB::table('question')
            ->join('lesson', 'question.lesson_id', '=', 'lesson.id')
            ->select('lesson.*', 'question.*', 'question.id as question_id', 'question.status as questionstatus')
            ->get();*/

			return view('candidate/candidatedetail', compact('get_candidates'));
		}else{
            return redirect('adminlogin');
        }
	}

	public function adminaddcandidate()
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
        	$get_classSection = DB::table('class')->get();
			return view('candidate/adminaddcandidate', compact('get_classSection'));
		}else{
            return redirect('adminlogin');
        }
	}

	public function admineditcandidate($id)
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
        	$get_classSection = DB::table('class')->get();
        	$get_candidate = DB::table('users')->where(['id'=>$id])->first();
			return view('candidate/admineditcandidate', compact('get_candidate','get_classSection'));
		}else{
            return redirect('adminlogin');
        }
	}
}