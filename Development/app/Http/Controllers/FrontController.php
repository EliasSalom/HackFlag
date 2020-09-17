<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Url;
use App\User;
use Session;
use DB;

class FrontController extends Controller
{

	public function login()
    {
    	return view('front/login');
    }

    public function register()
    {
    	return view('front/register');
    }

    public function profile()
    {
        $candidate = session()->get('candidate');
        if(isset($candidate->id) && $candidate->id != '')
        {
    	   return view('front/profile', compact('candidate'));
        }else{
            return redirect('/');
        }
    }

    public function aboutus()
    {
        $candidate = session()->get('candidate');
        $get_cms_about = DB::table('cms')->where(['id'=>1])->first();
    	return view('front/aboutus', compact('candidate','get_cms_about'));
    }

    public function winner()
    {
        $candidate = session()->get('candidate');
        if(isset($candidate->id) && $candidate->id != '')
        {
    	   return view('front/winner', compact('candidate'));
        }else{
            return redirect('/');
        }
    }

    public function forgotpassword()
    {
    	return view('front/forgotpassword');
    }

    public function addregister(Request $request)
    {
        $fname = $request->fname;
        $lname = $request->lname;
        $username = $request->username;
    	$email = $request->email;
        $organization = $request->organization;
    	$password = Hash::make($request->password);
    	$confirmpassword = $request->confirmpassword;
        $type=1;

        $username_exist = DB::table('users')->where(['username'=>$username])->count();

        $user = DB::table('users')->where(['email'=>$email])->count();

        if($user == 1)
        {
            return redirect()->route('register')->with('error', 'Email already register please use different email id!');
        }
        else if($username_exist == 1)
        {
         return redirect()->route('register')->with('error', 'Username already register please use different username!');   
        }
        else{
            $register =  DB::table('users')->insert(['first_name'=>$fname,'last_name'=>$lname,'username'=>$username,'email'=>$email,'type'=>$type,'status'=>0,'password'=>$password,'organization'=>$organization,'created_at'=>NOW(),'updated_at'=>NOW()]);

            return redirect()->route('login')->with('success', 'Candidate successfully register!');
        }
    }

    public function candidatelogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $user = DB::table('users')->where(['email'=>$email])->first();

            if($user->type == 1 && $user->status == 1)
            {
                Session::put('candidate', $user);
                return redirect('profile');
            }else {
                return back()->with('error','Please contact active your account');
            }
        }else{
            return back()->with('error','Please create your account');
        }
    }

    public function logout()
    {
         Session::flush();
        return redirect('/');
    }

    public function sendforgotpassword(Request $request)
    {
        $email = $request->email;

        $users = DB::table('users')->where('email',$email)->count();

        if($users == 1)
        {
            DB::table('users')
            ->where('email', $email)
            ->update(['mail_send' => 0]);
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
                $link = "https"; 
            else
                $link = "http"; 
              
            // Here append the common URL characters. 
            $link .= "://"; 
            $link .= $_SERVER['HTTP_HOST']; 
            $url = $link."/Hackflag/Development/public/newpassword/".base64_encode($email);

            $to = $email;
            $subject = "Forgot Email";

            $message = "
                <html>
                <head>
                <title>Forgot Email</title>
                </head>
                <body>
                <p>Dear ".$email.",</p>
                <p>Click here below the link:- <br/>
                <a href='".$url."'>Click Here</a></p>
                <p>Thanks</p>
                <p>Team Hackflag</p>
                </body>
                </html>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <info@hackflag.com>' . "\r\n";
            mail($to,$subject,$message,$headers);

            return redirect()->route('forgotpassword')->with('success', 'Password successfully sent please check email');
        }else{
            return redirect()->route('forgotpassword')->with('error', 'Incorrect email id please use different mail id');
        }
    }

    public function newpassword($emails)
    {
        $email = base64_decode($emails);
        $user = DB::table('users')->where('email',$email)->first();
        if(isset($user->mail_send) && $user->mail_send == 0)
        {
            return view('front/newpassword', compact('email'));
        }else{
            return redirect()->route('login')->with('error', 'Link has been expired!');
        }

    }

    public function updatemnewpassword(Request $request)
    {
        $newpassword = Hash::make($request->newpassword);
        $email = $request->email;
        $confirmpassword = $request->confirmpassword;
        $mail_send = 1;

        DB::table('users')
        ->where('email', $email)
        ->update(['mail_send' => $mail_send, 'password' => $newpassword]);

        return redirect()->route('login')->with('success', 'Password successfully updated!');
    }

    public function changepassword()
    {
        $candidate = session()->get('candidate');
        if(isset($candidate->id) && $candidate->id != '')
        {
           return view('front/changepassword', compact('candidate'));
        }else{
            return redirect('/');
        }
    }

    public function updatepassword(Request $request)
    {
        $candidate = session()->get('candidate');
        $candidate_id = $candidate->id;
        $currentpassword = $request->currentpassword;
        $newpassword = $request->newpassword;
        $confirmpassword = $request->confirmpassword;

        $candidate_user_password = Auth::user()->password;

        if (!(Hash::check($currentpassword, $candidate_user_password))) 
        {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again!");
        }else if(strcmp($currentpassword, $newpassword) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password!");
        }else{
            DB::table('users')
            ->where('id', $candidate_id)
            ->update(['password' => Hash::make($newpassword)]);
            return redirect()->back()->with("success","Password changed successfully!");
        }
        
    }

    public function gamecode()
    {
        $candidate = session()->get('candidate');
        if(isset($candidate->id) && $candidate->id != '')
        {

           return view('front/gamecode', compact('candidate'));
        }else{
            return redirect('/');
        }
    }

    public function gameplay(Request $request)
    {

        $game_code = $request->game_code;
        $candidate = session()->get('candidate');
        $candidate_id = $candidate->id;
        $game_count = DB::table('games')->where(['game_code'=>$game_code])->count();
        $game_detail = DB::table('games')->where(['game_code'=>$game_code])->first();

        //echo "<pre>"; print_r($game_detail); exit;

        if($game_count == 1)
        {
            $game_count_play = DB::table('gameplay')->where(['game_id'=>$game_detail->id])->count();
            $user_join_count = DB::table('gameplay')->where(['game_id'=>$game_detail->id, 'candidate_id' => $candidate_id])->count();
            if($user_join_count == 1)
            {                
                return redirect()->route('gamestarts', [base64_encode($game_detail->id)]);
            }
            else if($game_detail->game_play == $game_count_play)
            {
                return redirect()->back()->with("error","Game slot has been complete please join different game!");
            }
            else
            {
                $joingame =  DB::table('gameplay')->insert(['candidate_id'=>$candidate_id,'teacher_id'=>$game_detail->teacher_id,'game_id'=>$game_detail->id,'game_code'=>$game_code,'game_points'=>$game_detail->game_points,'created'=>NOW(),'updated'=>NOW()]);
                return redirect()->route('gamestarts', [base64_encode($game_detail->id)]);
            }    
        }
        else
        {
            return redirect()->back()->with("error","There error is some error on game code please check game code!");
        }
    }

    public function gamestarts($id)
    {

        $candidate = session()->get('candidate');
        $game_id = base64_decode($id); 
        if(isset($candidate->id) && $candidate->id != '')
        {
            $candidate_id = $candidate->id;
            $game_id = base64_decode($id); 
            $game_join_count = DB::table('gameplay')->where(['game_id'=>$game_id, 'candidate_id' => $candidate_id])->count();
            $get_game = DB::table('games')->where(['id'=>$game_id])->first();
            if($game_join_count == 1)
            {
                $game_code_count = DB::table('gameplay')->where(['game_id'=>$game_id])->count();                
                return view('front/gamestart', compact('candidate', 'game_code_count', 'get_game', 'candidate_id','game_id'));            
            }
            else
            {
                return redirect('profile');    
            }
        }
        else
        {
            return redirect('/');
        }
    }


    public function runcommand(Request $request)
    {
        $candidate = session()->get('candidate');
        $candidate_id = $request->candidate_id;
        $command = $request->command;
        $game_id = $request->game_id;
        $check_command = DB::table('commands')->where('command_name', $command)->count();
        $single_cmd = str_replace(' ', ',', $command);
        $explode_cmd = explode(',', $single_cmd);
        $cmd_count = count($explode_cmd);
               
        if($cmd_count > 0 &&  $cmd_count == 2)
        {            
            $check_username = DB::table('users')->where('username', $explode_cmd[1])->count();

            if($explode_cmd[0] == 'hack' && $check_username > 0)
            {

             $hacked_detail = DB::table('users')->where('username', $explode_cmd[1])->first();       
             $hacked_id = $hacked_detail->id; 
             $user_hacked_count = DB::table('hack_details')->where(['hacked_id'=>$hacked_id,'user_id'=>$candidate->id,'game_id'=>$game_id])->count();

                if($user_hacked_count > 0)
                {
                    echo 'hacked';
                    die();
                }
                else
                {
                    $hack_details =  DB::table('hack_details')->insert(['hacked_id'=>$hacked_id,'user_id'=>$candidate->id,'game_id'=>$game_id,'time_start'=>strtotime("now")]);
                    return view('includes/footer', compact('command','candidate_id','hacked_id','game_id'));    
                } 

                
            }
            else if($explode_cmd[0] == 'block' && $check_username > 0)
            {
                $hacker_detail = DB::table('users')->where('username', $explode_cmd[1])->first();       
                $hacker_id = $hacker_detail->id;
                DB::table('hack_details')->where('user_id', $hacker_id)->update(['time_end'=>strtotime("now")]);
                echo 'protected';
                    die();
            }
        }
        else if($cmd_count > 0 &&  $cmd_count > 2)
        {
            echo 'wrong';
        }                     
       

       if($check_command > 0)
        {
           if($command == 'check lan')
           {
             $get_game = DB::table('gameplay')->where(['game_id'=>$game_id])->get();

             $candidate_array = array(0 => 0);
                if($get_game)
                {
                    foreach ($get_game as $key => $value)
                    {
                       $candidate_array[]  =  $value->candidate_id;
                    }    
                }
             $get_joined_user = DB::table('users')->whereIn('id', $candidate_array)->get();
             return view('front/runcommand', compact('get_joined_user','command','candidate_id'));

           }
           else if($command == 'check user')
           {
             $get_game = DB::table('gameplay')->where(['game_id'=>$game_id])->get();
             $candidate_array = array(0 => 0);
                if($get_game)
                {
                    foreach ($get_game as $key => $value)
                    {
                       $candidate_array[]  =  $value->candidate_id;
                    }    
                }


             //$get_joined_user = DB::table('users')->whereIn('id', $candidate_array)->get();

             $get_joined_user = DB::table('users')
            ->join('gameplay', 'users.id', '=', 'gameplay.candidate_id')            
            ->select('users.*', 'gameplay.*')
            ->whereIn('users.id', $candidate_array)
            ->get();       

             return view('front/runcommand', compact('get_joined_user','command','candidate_id'));            
           }

           else if($command == 'upgrade shield')
           {
            $get_gameplay_points = DB::table('gameplay')->where(['game_id'=>$game_id,'candidate_id'=>$candidate_id])->first();

             $total_gameplay_points = $get_gameplay_points->game_points;
             $total_upgrade_shield_points = $get_gameplay_points->upgrade_shield_points;

             if($total_gameplay_points == 0)
              {
                echo 'upgrade shield';
                die(); 
              }

             $get_gamePoints = DB::table('games')->where(['id'=>$game_id])->first();

              $total_game_points = $get_gamePoints->game_points;
              $upgrade_shield_points = $get_gamePoints->upgrade_shield_points;

              $remianing_game_points = $total_gameplay_points - $upgrade_shield_points;
              $total_upgrade_shield_points = $total_upgrade_shield_points + $upgrade_shield_points;



              DB::table('gameplay')->where(['game_id'=>$game_id , 'candidate_id'=>$candidate_id])->update(['game_points'=> $remianing_game_points, 'upgrade_shield_points'=>$total_upgrade_shield_points]);             
             return view('front/runcommand', compact('get_joined_user','command','candidate_id'));           
          }

          else if($command == 'shield')
           {
             $get_gameplay_points = DB::table('gameplay')->where(['game_id'=>$game_id,'candidate_id'=>$candidate_id])->first();

             $total_gameplay_points = $get_gameplay_points->game_points;
             $total_shield_points = $get_gameplay_points->shield_points;

             if($total_gameplay_points == 0)
              {
                echo 'shield';
                die(); 
              }

             $get_gamePoints = DB::table('games')->where(['id'=>$game_id])->first();

              $total_game_points = $get_gamePoints->game_points;
              $shield_points = $get_gamePoints->shield_points;

              $remianing_game_points = $total_gameplay_points - $shield_points;
              $total_shield_points = $total_shield_points + $shield_points;
              

              DB::table('gameplay')->where(['game_id'=>$game_id , 'candidate_id'=>$candidate_id])->update(['game_points'=> $remianing_game_points, 'shield_points'=>$total_shield_points, 'is_shield'=>1 ]); 

             return view('front/runcommand', compact('get_joined_user','command','candidate_id'));            
           }           

           else if($command == 'clear')
           {
             echo 'clear';

           }
           else if($command == 'help')
           {
              $get_commands = DB::table('commands')->where('command_name', '!=', 'help')->get();
              return view('front/runcommand', compact('get_commands','command','candidate_id'));  
           }            
        }
        else
        {
            echo 'wrong';
        }
        die();  
       

    }

    /*public function userhack(Request $request)
    {
        $candidate_id = $request->candidate_id;
        $user_hack = DB::table('hack_details')->where(['hacked_id'=>$candidate_id])->count();

        echo $user_hack; exit;

    }*/

public function hackedinfo(Request $request)
    {
        $candidate_id = $request->candidate_id;
        $user_hacked = '';

        $is_hacked = DB::table('hack_details')->where('hacked_id',$candidate_id)->where(['is_view'=>0,'time_end'=>null])->count();
        
        if($is_hacked > 0)
        {          

            $hacker_detail = array();
             $is_hacked = DB::table('hack_details')->where(['hacked_id'=>$candidate_id,'is_view'=>0,'time_end'=>null ])->get();

             $is_hacked = DB::table('hack_details')
            ->join('users', 'hack_details.user_id', '=', 'users.id')            
            ->select('users.*', 'hack_details.*')
            ->where(['hacked_id'=>$candidate_id,'is_view'=>0,'time_end'=>null ])
            ->get();

             DB::table('hack_details')->where('hacked_id', $candidate_id)->update(['is_view' => 1]);

            // $hacker_detail = DB::table('users')->where(['user_id'=>$is_hacked->user_id])->get();            
            // $user_hacked = 'user_hacked';      
             return view('front/hackedinfo', compact('is_hacked'));
             
        }
    }


    public function gamestartstatus(Request $request)
    {   
        $candidate = session()->get('candidate');     
        $candidate_id = $request->candidate_id; 
        $game_id = $request->game_id;

        $get_startgame_status = DB::table('gameplay')
            ->join('games', 'games.id', '=', 'gameplay.game_id')            
            ->select('games.*', 'gameplay.*')
            ->where('candidate_id', $candidate_id)
            ->where('game_id', $game_id)
            ->first();  

            //echo "<pre>"; print_r($get_startgame_status); exit;

            if($get_startgame_status->is_start == 0 )
            {
                echo '0';
                die();
            }
            else
            {
                return view('front/gamestart', compact('candidate','candidate_id','game_id'));

            }    

    }


    public function hackstatus(Request $request)
    {        
        $candidate_id = $request->candidate_id; 
        $game_id = $request->game_id;

        /*$get_startgame_status = DB::table('hack_details')
            ->join('games', 'games.id', '=', 'gameplay.game_id')            
            ->select('games.*', 'gameplay.*')
            ->where('candidate_id', $candidate_id)
            ->where('game_id', $game_id)
            ->first(); */

            $get_hack_details = DB::table('hack_details')
            ->where(['hacked_id' => $candidate_id, 'game_id' => $game_id, 'is_view' => 0])
            ->get();

            echo "<pre>"; print_r($get_hack_details); exit;

            //echo "<pre>"; print_r($get_startgame_status); exit;

            if($get_startgame_status->is_start == 0 )
            {
                echo '0';
                die();
            }
            else
            {
                return view('front/gamestart', compact('candidate_id','game_id'));

            }    

    }

    
}