<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Url;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class CmsController extends Controller
{
	public function cmsmanagement()
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
        	$get_cmss = DB::table('cms')->get();
			return view('cms/cmsindex', compact('get_cmss'));
		}else{
            return redirect('adminlogin');
        }	
	}

	public function editcms($id)
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
        	$get_cms = DB::table('cms')->where('id', $id)->first();
			return view('cms/editcms', compact('get_cms'));
		}else{
            return redirect('adminlogin');
        }
	}

	public function cmsupdate(Request $request)
	{
		$title = $request->title;
		$id = $request->id;
		$description = $request->description;

		DB::table('cms')
        ->where('id', $id)
        ->update(['title' => $title, 'description' => $description]);

        return redirect()->route('cms/cmsmanagement')->with('success', 'Cms Management Successfully updated! ');
	}
}