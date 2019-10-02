<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ImageController extends Controller
{
    //
    public function upload(Request $request){
    	$validator = Validator::make($request->all(),[
    		'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2056'
    	]);

    	$testimoniid = '1';

    	$imageName = $testimoniid.'.'.$request->file('foto')->getClientOriginalExtension();
    	$request->file('foto')->move(public_path('images/testimoni'),$imageName);
    	return redirect('/profile');
    }
}
