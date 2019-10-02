<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NilaiImport;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
     public function import(Request $request){
    	//$path = $request->file('file')->getClientOriginalName();
    	$datanya = Excel::toArray(new NilaiImport, $request->file('file'));
    	$data = $datanya[0];
    	$role = $request->role;
    	if($data[0][1]=='induk'){
    		if($role == 'siswa'){
	    		for($i=1; $i<count($data); $i++){

	    			$user = User::where('code',$data[$i][1])->first();

	    			$newuser = false;

	    			if(!$user){
	    				$user = new User;
	    				$user->password = bcrypt('12345');
	    				$newuser = true;
	    			}
	    			//DB::enableQueryLog(); 
	    			
	    			//return response()->json(['res'=>DB::getQueryLog()],422);

	    			$user->code = $data[$i][1];
	    			$user->name = $data[$i][2];
	    			$user->gender = $data[$i][3];
	    			$user->role = $role;
	    			$user->save();

	    			if($newuser){
	    				$ortu = new User;
	    				$ortu->password = bcrypt('12345');
	    				$ortu->code = "100".$data[$i][1];
	    				$ortu->name = "Ortu ".$data[$i][2];
	    				$ortu->role = "ortu";
	    				$ortu->save();
	    			}

	    			$class_id_new = DB::table('classrooms as cr')->select('cr.id')
	    							->join('years as y','y.id','=','cr.year_id')
	    							->where('y.year_name',$data[$i][5])
	    							->where('cr.class_name',$data[$i][4])
	    							->first();

	    			$class_id = DB::table('classrooms as cr')->select('cr.id')
	    						->join('class_user as cu','cu.class_id','=','cr.id')
	    						->join('years as y','y.id','=','cr.year_id')
	    						->where('y.year_name',$data[$i][5])
	    						->where('cu.student_id',$user->id)
	    						->first();

	    			if($class_id){
	    				DB::table('class_user')
	    				->where(['student_id'=>$user->id, 'class_id'=>$class_id->id])->update([
	    					'class_id'=>$class_id_new->id
	    				]);
	    			}
	    			else{
	    				DB::table('class_user')->insert([
	    					'student_id'=>$user->id, 'class_id'=>$class_id_new->id
	    				]);
	    			}
	    		}
	    	}
    		return response()->json(['message'=>"Berhasil import user"]);
    	}
    	else
    		return response()->json(['message'=>"Format rapor anda salah"],422);
    }

    public function studentByActiveClass($search){
    	$usersclass = DB::table('class_user as cu')->join('classrooms as c','c.id','=','cu.class_id')->join('years as y','y.id','=','c.year_id')->where('c.class_name',$search)->where('y.year_isActive','y')->pluck('student_id')->toArray();
    	$users = DB::table('users')->whereIn('id',$usersclass)->orderBy('name')->paginate(10);
    	return response()->json(['users'=>$users, 'message'=>'Berhasil mendapatkan data user' ]);
    }

    public function passwordReset($id){
    	$user = User::where('id',$id)->first();
    	$user->password = bcrypt('12345');
    	$user->save();
    	return response()->json(['message'=>'Berhasil Reset Password']);
    }

    public function passwordOrtuReset($id){
    	$user = User::where('id',$id)->first();
    	$ortu = User::where('code','100'.$user->code)->first();
    	$ortu->password = bcrypt('12345');
    	$ortu->save();
    	return response()->json(['message'=>'Berhasil Reset Password']);
    }
}
