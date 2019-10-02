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

Route::get('/', function () {
	return view('generaltemplate');
});
//Auth::routes();

Route::middleware(['login'])->group(function () {
	//Route::get('/home', 'HomeController@index')->name('home');
	
	Route::get('/logout',  'AuthController@logout');

	//user session
	Route::get('/usersession', 'AuthController@userSession');
	Route::patch('/usersession', 'AuthController@userSessionUpdate');
	Route::patch('/userpassword', 'AuthController@userPasswordUpdate');

	

	Route::post('/uploadimage', 'ImageController@upload');

	//follower
	Route::get('/follow/{id}', 'FollowController@show');

	//score
	Route::get('/score/self','ScoreController@self');

	//subject
	Route::get('/subject','SubjectController@index');

	//classes
	Route::get('/kelas/yearactive','KelasController@yearActive');

	//post
	Route::get('/post/self','PostController@self');
});

Route::middleware(['nilai'])->group(function(){
	//nilai
	Route::post('/scoreupload', 'ScoreController@import');
	Route::post('/score/filteredone','ScoreController@filteredone');
	//Route::post('/score/uploadedactiveyear','ScoreController@uploadedActiveYear');
	Route::post('/score/deletefilteredone','ScoreController@deletefilteredone');

	//tagihan
	Route::post('/bill/subjectclassactiveyear','ScoreController@subjectclassactiveyear');

	Route::post('/user/upload', 'UserController@import');

	//post
	Route::post('/post','PostController@store');
	Route::get('/post/from/{id}','PostController@from');
	Route::delete('/post/{id}','PostController@delete');

	//user
	Route::get('user/yearactive/class/{class}','UserController@studentByActiveClass');
	Route::get('user/reset/{id}','UserController@passwordReset');
	Route::get('ortu/reset/{id}','UserController@passwordOrtuReset');
});
//Login
Route::post('/login',  'AuthController@login');



