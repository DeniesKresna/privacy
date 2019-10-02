<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    //
    public function yearActive(){
    	$classes = DB::table('classrooms as cr')->join('years as y','cr.year_id','=','y.id')->where('y.year_isActive','y')->select('cr.*')->get();
    	return response()->json(['classes'=>$classes]);
    }
}
