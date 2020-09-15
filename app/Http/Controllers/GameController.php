<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Url;
use App\User;
use Session;
use DB;

class GameController extends Controller
{
	public function index()
	{
		$array_count_game=array();
		$teacher = session()->get('teacher');
        if(isset($teacher->id) && $teacher->id != '')
        {
        	$get_game_detailss = DB::table('games')
        	->where('teacher_id', $teacher->id)        	
        	->orderBy('id','desc')
        	->get();

        	$get_game_details = DB::table('gameplay')
        	->select(array('game_id', DB::raw('COUNT(id) as total_candidate')))
        	->where('teacher_id', $teacher->id)        	
        	->groupBy('game_id')
        	->get();

        	if($get_game_details)
        	{
	        	foreach ($get_game_details as $key => $value)
	        	{        		
	        		$array_count_game[$value->game_id] = $value->total_candidate;
	        	}
        	}
        	
			return view('game/index', compact('get_game_detailss','array_count_game'));
		}else{
            return redirect('adminlogin');
        }	
	}

	public function addgame()
	{
		$teacher = session()->get('teacher');
		$admin = session()->get('admin');
        if(isset($teacher->id) && $teacher->id != '')
        {        	
			return view('game/addgame');
		}else{
            return redirect('adminlogin');
        }

	}


	public function adminaddgame()
	{
         $get_allclass = DB::table('allclass')->get();
        $get_section = DB::table('allsection')->get();
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {     
           	$get_teachers = DB::table('users')->where('type',2)->get();
			return view('game/adminaddgame', compact('get_teachers','get_allclass','get_section'));
		}else{
            return redirect('adminlogin');
        }

	}

	public function add(Request $request)
	{       

		$game_name = $request->game_name;
		$game_description = $request->game_description;
		$game_code = $request->game_code;
        $game_mode = $request->game_mode;
        $classes = $request->classes;
        $section = $request->section;
		$game_play = $request->game_play;
		$teacher_id = $request->teacher;
		$game_points = $request->game_points;
		$shield_points = $request->shield_points;
		$upgrade_shield_points = $request->upgrade_shield_points;
		$teacher = session()->get('teacher');
		if(isset($teacher) && $teacher != '')
		{
			$teacher_id = $teacher->id;
		}
		else
		{
			$teacher_id = $teacher_id;	
		}


		$admin = session()->get('admin');
		if(isset($admin) && $admin != '')
		{
			$is_admin = 1;	
		}
		else
		{
			$is_admin = 0;
		}

		if($request->hasFile('game_image'))
        {
           	$image = $request->file('game_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/game');
            $image->move($destinationPath, $name);
     	}

     	$games =  DB::table('games')->insert(['game_name'=>$game_name,'game_description'=>$game_description,'game_image'=>$name,'game_code'=>$game_code,'game_mode'=>$game_mode,'class'=>$classes,'section'=>$section,'status'=>1,'game_play'=>$game_play,'teacher_id'=>$teacher_id,'created'=>NOW(),'updated'=>NOW(),'is_admin'=>$is_admin, 'game_points'=> $game_points, 'shield_points'=> $shield_points, 'upgrade_shield_points'=> $upgrade_shield_points]);

     	if($is_admin == 1)
     	{
     		return redirect()->route('game/admingamedetails')->with('success', 'Game successfully registered!');	
     	}
     	else
     	{
     		return redirect()->route('game/index')->with('success', 'Game successfully registered!');	
     	}
	    
		
	}

	public function gamestatus(Request $request)
	{
		$game_id = $request->game_id;
        $status_id = $request->status_id;

        if($status_id == 0)
            $statusid = $status_id;
        else
            $statusid = $status_id;

        DB::table('games')
        ->where('id', $game_id)
        ->update(['status' => $statusid]);

        echo $statusid;
        die();
	}

	public function deletedgame(Request $request)
	{
		$id = $request->id;

        DB::table('games')->where(['id'=>$id])->delete();
        echo '1';
        die();
	}

	public function editgame($id)
	{
        $get_allclass = DB::table('allclass')->get();
        $get_section = DB::table('allsection')->get();
		$teacher = session()->get('teacher');
        if(isset($teacher->id) && $teacher->id != '')
        {
        	$get_game = DB::table('games')->where('id', $id)->first();
			return view('game/editgame', compact('get_game','get_allclass','get_section'));
		}else{
            return redirect('adminlogin');
        }
	}

	public function admineditgame($id)
	{
        $get_allclass = DB::table('allclass')->get();
        $get_section = DB::table('allsection')->get();
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
        	$get_teachers = DB::table('users')->where('type',2)->get();
        	$get_game = DB::table('games')->where('id', $id)->first();
			return view('game/admineditgame', compact('get_game','get_teachers','get_allclass','get_section'));
		}else{
            return redirect('adminlogin');
        }
	}

	public function updategame(Request $request)
	{
		$game_name = $request->game_name;
		$game_description = $request->game_description;
		$imageold = $request->imageold;
		$id = $request->id;
		$game_code = $request->game_code;
        $game_mode = $request->game_mode;
        $classes = $request->classes;
        $section = $request->section;
		$game_play = $request->game_play;
		$game_points = $request->game_points;
		$shield_points = $request->shield_points;
		$upgrade_shield_points = $request->upgrade_shield_points;

		if($request->hasFile('game_image'))
        {
           	$image = $request->file('game_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/game');
            $image->move($destinationPath, $name);
     	}else{
     		$name = $imageold;
     	}

     	DB::table('games')
        ->where('id', $id)
        ->update(['game_name' => $game_name, 'game_description' => $game_description, 'game_image' => $name, 'game_code' => $game_code,'game_mode'=>$game_mode,'class'=>$classes,'section'=>$section, 'game_play' => $game_play, 'updated' => NOW(), 'game_points'=>$game_points, 'shield_points'=>$shield_points, 'upgrade_shield_points'=> $upgrade_shield_points]);

        return redirect()->route('game/admingamedetails')->with('success', 'Game successfully updated!');
	}

	/*public function gamedetails()
	{
		$admin = session()->get('teacher');
        if(isset($admin->id) && $admin->id != '')
        {
        	$get_game_details = DB::table('games')->where('is_admin', 0)->where('teacher_id', )->orderBy('id','desc')->get();
			return view('game/gamedetails', compact('get_game_details'));
		}else{
            return redirect('adminlogin');
        }	
	}*/

	public function admingamedetails()
	{
		$admin = session()->get('admin');
        if(isset($admin->id) && $admin->id != '')
        {
        	$get_game_details = DB::table('games')
            ->join('users', 'games.teacher_id', '=', 'users.id')
            ->select('users.*', 'games.*', 'games.id as games_id')
            ->orderBy('users.id','desc')
            ->get();
			return view('game/admingamedetails', compact('get_game_details'));
		}else{
            return redirect('adminlogin');
        }	
	}

	public function gamestart(Request $request)
	{
		$game_id = $request->game_id;
		$is_start = $request->is_start;
		

		$teacher = session()->get('teacher');
        if(isset($teacher->id) && $teacher->id != '')
        {
        	
			$get_game_person = DB::table('games')
            ->where('id',$game_id)
            ->first(); 

            $get_joined_game = DB::table('gameplay')
            ->where('game_id',$game_id)
            ->count();
            
           $number_of_players =  $get_game_person->game_play;

           if($number_of_players > $get_joined_game)
            {
            	echo '0';
            }
            else if($is_start == 1 )
            {

            	DB::table('games')
        		->where('id', $game_id)
        		->update(['is_start' => 0]);
            	echo '2';
            }
            else
            {
            	DB::table('games')
        		->where('id', $game_id)
        		->update(['is_start' => 1]);
            	
            	echo '1';

            }
            die();

		/*	return view('game/admingamedetails', compact('get_game_details'));
		}else{
            return redirect('adminlogin');
        }*/	
		}
	}

 

	public function getuserdetail(Request $request)
	{
		    $game_id = $request->id;
		    $teacher = session()->get('teacher');        
            $get_joined_game = DB::table('gameplay')
            ->where('game_id',$game_id)
            ->get();            
            
            foreach ($get_joined_game as $key => $value)
            {
            	$all_data[] = $value->candidate_id;
            }
          
            $get_details = DB::table('users')
            ->whereIn('id',$all_data)
            ->get();

            return view('game/getuserdetail', compact('get_details'));
            echo '1';
            die();
			
		}
	


}