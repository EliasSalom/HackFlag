<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'FrontController@login'); 
Route::get('/', 'FrontController@login')->name('login');


Route::get('register', 'FrontController@register')->name('register');
Route::get('profile', 'FrontController@profile')->name('profile');
Route::post('hackedinfo', 'FrontController@hackedinfo')->name('hackedinfo');
Route::get('aboutus', 'FrontController@aboutus')->name('aboutus');
Route::get('winner', 'FrontController@winner')->name('winner');
Route::get('forgotpassword', 'FrontController@forgotpassword')->name('forgotpassword');
Route::get('logout', 'FrontController@logout')->name('logout');
Route::post('addregister', 'FrontController@addregister')->name('addregister');
Route::post('candidatelogin', 'FrontController@candidatelogin')->name('candidatelogin');
Route::post('sendforgotpassword', 'FrontController@sendforgotpassword')->name('sendforgotpassword');
Route::post('updatemnewpassword', 'FrontController@updatemnewpassword')->name('updatemnewpassword');
Route::post('updatepassword', 'FrontController@updatepassword')->name('updatepassword');
Route::get('newpassword/{email}', 'FrontController@newpassword')->name('newpassword');
Route::get('changepassword', 'FrontController@changepassword')->name('changepassword');
Route::get('gamecode', 'FrontController@gamecode')->name('gamecode');
Route::get('gamestarts/{id}', 'FrontController@gamestarts')->name('gamestarts');
Route::post('gameplay', 'FrontController@gameplay')->name('gameplay');
Route::post('runcommand', 'FrontController@runcommand')->name('runcommand');
Route::post('userhack', 'FrontController@userhack')->name('userhack');
Route::post('gamestartstatus', 'FrontController@gamestartstatus')->name('gamestartstatus');
Route::post('hackstatus', 'FrontController@hackstatus')->name('hackstatus');



//admin start
Route::get('adminlogin', 'AdminController@adminlogin')->name('adminlogin');
Route::post('addlogin', 'AdminController@addlogin')->name('addlogin');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin/dashboard');
Route::get('class/allclass', 'ClassController@allclass')->name('class/allclass');
Route::get('teacher/allteacher', 'TeacherController@allteacher')->name('teacher/allteacher');
Route::get('candidate/candidatedetail', 'CandidateController@candidatedetail')->name('candidate/candidatedetail');
Route::get('candidate/adminaddcandidate', 'CandidateController@adminaddcandidate')->name('candidate/adminaddcandidate');
Route::get('candidate/admineditcandidate/{id}', 'CandidateController@admineditcandidate')->name('candidate/admineditcandidate');
Route::get('teacher/addteacher', 'TeacherController@addteacher')->name('teacher/addteacher');
Route::get('class/addclass', 'ClassController@addclass')->name('class/addclass');
Route::get('teacher/editteacher/{id}', 'TeacherController@editteacher')->name('teacher/editteacher');
Route::get('class/editclass/{id}', 'ClassController@editclass')->name('class/editclass');
Route::post('insertteacher', 'TeacherController@insertteacher')->name('insertteacher');
Route::post('insertclass', 'classController@insertclass')->name('insertclass');
Route::post('deletedteachers', 'TeacherController@deletedteachers')->name('deletedteachers');
Route::post('deletedclass', 'ClassController@deletedclass')->name('deletedclass');
Route::post('teacherstatus', 'TeacherController@teacherstatus')->name('teacherstatus');
Route::post('teacher/updateteacher', 'TeacherController@updateteacher')->name('teacher/updateteacher');
Route::post('class/updateclass', 'ClassController@updateclass')->name('class/updateclass');
Route::get('game/gamedetails', 'GameController@gamedetails')->name('game/gamedetails');
Route::get('game/admingamedetails', 'GameController@admingamedetails')->name('game/admingamedetails');

//end admin


//teacher start
Route::get('teacher/dashboard', 'TeacherController@dashboard')->name('teacher/dashboard');
Route::get('candidate/allcandidate', 'CandidateController@allcandidate')->name('candidate/allcandidate');
Route::get('cms/cmsmanagement', 'CmsController@cmsmanagement')->name('cms/cmsmanagement');
Route::get('candidate/addcandidate', 'CandidateController@addcandidate')->name('candidate/addcandidate');
Route::get('candidate/editcandidate/{id}', 'CandidateController@editcandidate')->name('candidate/editcandidate');
Route::get('cms/editcms/{id}', 'CmsController@editcms')->name('cms/editcms');
Route::post('insertcandidate', 'CandidateController@insertcandidate')->name('insertcandidate');
Route::post('insertadmincandidate', 'CandidateController@insertadmincandidate')->name('insertadmincandidate');
Route::post('adminupdatecandate', 'CandidateController@adminupdatecandate')->name('adminupdatecandate');
Route::post('candidatestatus', 'CandidateController@candidatestatus')->name('candidatestatus');
Route::post('deletedcandidate', 'CandidateController@deletedcandidate')->name('deletedcandidate');
Route::post('canidate/updatecandate', 'CandidateController@updatecandate')->name('canidate/updatecandate');
Route::post('cms/cmsupdate', 'CmsController@cmsupdate')->name('cms/cmsupdate');

Route::get('game/index', 'GameController@index')->name('game/index');
Route::get('game/editgame/{id}', 'GameController@editgame')->name('game/editgame');
Route::get('game/admineditgame/{id}', 'GameController@admineditgame')->name('game/admineditgame');
Route::get('game/addgame', 'GameController@addgame')->name('game/addgame');
Route::get('game/adminaddgame', 'GameController@adminaddgame')->name('game/adminaddgame');
Route::post('game/add', 'GameController@add')->name('game/add');
Route::post('gamestatus', 'GameController@gamestatus')->name('gamestatus');
Route::post('gamestart', 'GameController@gamestart')->name('gamestart');
Route::post('game/getuserdetail', 'GameController@getuserdetail')->name('game/getuserdetail');
Route::post('deletedgame', 'GameController@deletedgame')->name('deletedgame');
Route::post('updategame', 'GameController@updategame')->name('updategame');
//teacher end



//candidate start

Route::get('admin/logout', 'AdminController@logout')->name('admin/logout');
//end candidate