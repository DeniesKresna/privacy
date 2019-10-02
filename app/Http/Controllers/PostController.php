<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //
	public function store(Request $request){
		$post = new Post;
		$validator = Validator::make($request->all(), $post->createRules);
		if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()],422);
        }
        $post->post_title = $request->addPostTitle;
        $post->post_content = $request->addPostText;
        $post->post_isActive = 'y';
        $post->post_created_by = Auth::user()->id;
        $post->save();

        return response()->json(['message'=>"Berhasil Tambah Post"]);
	}

    public function self(){
        $followed_ids = DB::table('follows')->where('follower_id',Auth::user()->id)->pluck('followed_id')->toArray();
        array_push( $followed_ids, Auth::user()->id);
        $posts = DB::table('posts as p')->select('p.*','u.name')->join('users as u','u.id','=','p.post_created_by')->whereIn('p.post_created_by',$followed_ids)->where('p.post_isActive','y')->orderBy('p.created_at','desc')->paginate(5);
        return response()->json(['posts'=>$posts]);
    }

    public function from($id){
        $posts = DB::table('posts as p')->select('p.*','u.name')->join('users as u','u.id','=','p.post_created_by')->where('p.post_created_by',$id)->where('p.post_isActive','y')->orderBy('p.created_at','desc')->paginate(5);
        return response()->json(['posts'=>$posts]);
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        if($post->created_by == Auth::user()->id){
            $post->delete();
            return response()->json(['message'=>"Berhasil menghapus postingan"]);
        }
        return response()->json(['message'=>"Ini bukan postingan anda"],403);
    }
}
