<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    //
    public function show($id){
    	$following = DB::table('follows as f')->select('u.name','u.id','u.code')->join('users as u','u.id','=','f.followed_id')->where('follower_id',$id)->get();
    	$follower = DB::table('follows as f')->select('u.name','u.id','u.code')->join('users as u','u.id','=','f.follower_id')->where('followed_id',$id)->get();
    	return response()->json(['following'=>$following, 'follower'=>$follower]);
    }
}
