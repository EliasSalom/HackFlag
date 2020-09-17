<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Url;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class ClassController extends Controller
{
	public function dashboard()
	{
		$class = session()->get('class');
        if(isset($class->id) && $class->id != '')
        {
			return view('class/dashboard');
		}else{
            return redirect('adminlogin');
        }
	}

	public function allclass()
	{
		$get_class = '';
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
			$get_class = DB::table('class')->get();

			return view('class/allclass', compact('get_class'));
		}else{
            return redirect('adminlogin');
        }	
	}

	public function addclass()
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
        	$get_class = DB::table('allclass')->get();
        	$get_section = DB::table('allsection')->get();

			return view('class/addclass', compact('get_class','get_section'));

		}else{
            return redirect('adminlogin');
        }
	}

	public function insertclass(Request $request)
	{
		$class_name = $request->class_name;
		$section_name = $request->section_name;

	        $class =  DB::table('class')->insert(['class_name'=>$class_name,'section_name'=>$section_name, 'created_at'=>NOW(),'updated_at'=>NOW()]);

	        return redirect()->route('class/allclass')->with('success', 'class successfully inserted!');
	    }
	

	public function editclass($id)
	{
		$admin = session()->get('admin');
		$get_classes = DB::table('allclass')->get();
        $get_sections = DB::table('allsection')->get();
        if(isset($admin->id) && $admin->id != '')
        {
			$get_class = DB::table('class')->where(['id'=>$id])->first();
			return view('class/editclass', compact('get_class','get_classes','get_sections'));
		}else{
            return redirect('adminlogin');
        }	
	}

	public function classtatus(Request $request)
	{
		$class_id = $request->class_id;
        $status_id = $request->status_id;

        if($status_id == 0)
            $statusid = $status_id;
        else
            $statusid = $status_id;

        DB::table('users')
        ->where('id', $class_id)
        ->update(['status' => $statusid]);

        echo $statusid;
        die();
	}

	public function deletedclass(Request $request)
	{
		$id = $request->id;

        DB::table('class')->where(['id'=>$id])->delete();
        echo '1';
        die();
	}

	public function updateclass(Request $request)
	{
		$class_name = $request->class_name;
		$section_name = $request->section_name;
		$id = $request->id;
		
        DB::table('class')
        ->where('id', $id)
        ->update(['class_name' => $class_name,'section_name'=>$section_name,'updated_at'=>NOW()]);

        return redirect()->route('class/allclass')->with('success', 'class Successfully updated! ');
	}
}