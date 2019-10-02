<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Score;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('content.home');
    }

    public function profile(){
        $user = Auth::user();
        $scores = DB::table('scores as sc')->join('subjects as s','s.id','=','sc.score_subject_id')
        ->where('sc.score_student_code',$user->code)->orderBy('sc.created_at','desc')->get();

        return view('content/profile',['scores'=>$scores]);
    }
}
