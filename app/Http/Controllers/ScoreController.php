<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NilaiImport;
use Illuminate\Support\Facades\DB;
use App\Score;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ScoreController extends Controller
{
    //
    public function import(Request $request){
    	//$path = $request->file('file')->getClientOriginalName();
    	$datanya = Excel::toArray(new NilaiImport, $request->file('file'));
        if($request->formad == 'local'){
        	$data = $datanya[1];
            //return response()->json(['data'=>$data]);
            if($data[0][1] == 'Kelas :'){
                $subject = DB::table('subjects')->where('id',$request->subject)->first();
                $kd = $request->kd;
                $datetest = $request->datetest;
            	$ta = DB::table('years')->where('year_isActive','y')->first();
                $type = $request->type;
            	$user = Auth::user();
                $kkm = 75;
                if(strpos($request->subject, 'L') !== false) $kkm = 80;

                $startColumn = 0;
                switch($kd){
                    case 1: $startColumn=5; break;
                    case 2: $startColumn=15; break;
                    case 3: $startColumn=25; break;
                    case 4: $startColumn=35; break;
                    case 5: $startColumn=45; break;
                    case 6: $startColumn=55; break;
                    case 7: $startColumn=65; break;
                    case 8: $startColumn=75; break;
                    case 9: $startColumn=85; break;
                    case 10: $startColumn=95; break;
                    case 11: $startColumn=5; break;
                    case 12: $startColumn=15; break;
                    case 13: $startColumn=25; break;
                    case 14: $startColumn=35; break;
                    case 15: $startColumn=45; break;
                    case 16: $startColumn=55; break;
                    case 17: $startColumn=65; break;
                    case 18: $startColumn=75; break;
                    case 19: $startColumn=85; break;
                    case 20: $startColumn=95; break;
                    default: $startColumn=0;
                }

                switch($type){
                    case 'Tes': $startColumn=$startColumn+0; break;
                    case 'Tugas': $startColumn=$startColumn+3; break;
                    case 'PAS': $startColumn=$startColumn+6; break;
                    default: $startColumn=0;
                }
                //return response()->json(['sc'=>$startColumn]);

            	for($i=7; $i<47; $i++){
            		if($data[$i][$startColumn] != null){
                        $existScore = Score::where('score_student_code',$data[$i][3])
                            ->where('score_subject_id',$subject->id)
                            ->where('score_kd', $kd)->where('score_type',$type)
                            ->where('score_year_id',$ta->id)
                            ->first();

                        if($existScore)
                            $score = $existScore;
                        else
                            $score = new Score;

        	    		$score->score_student_code = $data[$i][3];
        	    		$score->score_subject_id = $subject->id;
        	    		$score->score_kd = $kd;
        	    		$score->score_type = $type;
        	    		$score->score_year_id = $ta->id;
        	    		$score->score_nilai = $data[$i][$startColumn];
        	    		$score->score_remed = $data[$i][$startColumn+1];
                        if(!is_null($score->score_nilai)){
                            $nil = $score->score_nilai;
                            $rem = $score->score_remed;
                            if($nil >= $kkm) $score->score_na = $nil;
                            else if($rem >= $kkm) $score->score_na = $kkm;
                            else $score->score_na = max($nil, $rem);
                        }
                        $score->score_date = $datetest;
                        $dateupload = new Datetime();
                        $datediff = date_diff(new Datetime($datetest),$dateupload)->format('%a');
                        if($datediff > 14){
                            if($score->score_nilai > 0 && $score->score_nilai != null)
                                $score->score_nilai = 50;
                            if($score->score_remed > 0 && $score->score_remed != null)
                                $score->score_remed = 50;
                            if($score->score_na > 0 && $score->score_na != null)
                                $score->score_na = 50;
                        }
        	    		$score->score_created_by = $user->id;
        	    		$score->score_updated_by = $user->id;
        	    		$score->save();
            		}
            	}
            }
            else{
                return response()->json(['message'=>"Format rapor anda salah"],422);
            }
        }
        else{
            $data = $datanya[0];
            if($data[0][0] == 'Kode'){
                $subject = DB::table('subjects')->where('id',$request->subject)->first();
                $kd = $request->kd;
                $datetest = $request->datetest;
                $ta = DB::table('years')->where('year_isActive','y')->first();
                $type = $request->type;
                $user = Auth::user();
                $kkm = 75;
                if(strpos($request->subject, 'L') !== false) $kkm = 80;

                $startColumn = 0;
                switch($kd){
                    case 1: $startColumn=2; break;
                    case 2: $startColumn=12; break;
                    case 3: $startColumn=22; break;
                    case 4: $startColumn=32; break;
                    case 5: $startColumn=42; break;
                    case 6: $startColumn=52; break;
                    case 7: $startColumn=62; break;
                    case 8: $startColumn=72; break;
                    case 9: $startColumn=82; break;
                    case 10: $startColumn=92; break;
                    case 11: $startColumn=2; break;
                    case 12: $startColumn=12; break;
                    case 13: $startColumn=22; break;
                    case 14: $startColumn=32; break;
                    case 15: $startColumn=42; break;
                    case 16: $startColumn=52; break;
                    case 17: $startColumn=62; break;
                    case 18: $startColumn=72; break;
                    case 19: $startColumn=82; break;
                    case 20: $startColumn=92; break;
                    default: $startColumn=0;
                }

                switch($type){
                    case 'Tes': $startColumn=$startColumn+0; break;
                    case 'Tugas': $startColumn=$startColumn+3; break;
                    case 'PAS': $startColumn=$startColumn+6; break;
                    default: $startColumn=0;
                }

                for($i=2; $i<count($data); $i++){
                    if($data[$i][$startColumn] != null){
                        $student = DB::table('users')->where('petra_code',$data[$i][0])->first();
                        $existScore = Score::where('score_student_code',$student->code)
                            ->where('score_subject_id',$subject->id)
                            ->where('score_kd', $kd)->where('score_type',$type)
                            ->where('score_year_id',$ta->id)
                            ->first();

                        if($existScore)
                            $score = $existScore;
                        else
                            $score = new Score;

                        $score->score_student_code = $student->code;
                        $score->score_subject_id = $subject->id;
                        $score->score_kd = $kd;
                        $score->score_type = $type;
                        $score->score_year_id = $ta->id;
                        $score->score_nilai = $data[$i][$startColumn];
                        $score->score_remed = $data[$i][$startColumn+1];
                        if(!is_null($score->score_nilai)){
                            $nil = $score->score_nilai;
                            $rem = $score->score_remed;
                            if($nil >= $kkm) $score->score_na = $nil;
                            else if($rem >= $kkm) $score->score_na = $kkm;
                            else $score->score_na = max($nil, $rem);
                        }
                        $score->score_date = $datetest;
                        $dateupload = new Datetime();
                        $datediff = date_diff(new Datetime($datetest),$dateupload)->format('%a');
                        if($datediff > 14){
                            if($score->score_nilai > 0 && $score->score_nilai != null)
                                $score->score_nilai = 50;
                            if($score->score_remed > 0 && $score->score_remed != null)
                                $score->score_remed = 50;
                            if($score->score_na > 0 && $score->score_na != null)
                                $score->score_na = 50;
                        }
                        $score->score_created_by = $user->id;
                        $score->score_updated_by = $user->id;
                        $score->save();
                    }
                }
            }
            else{
                return response()->json(['message'=>"Format rapor anda salah"],422);
            }
        }

    	return response()->json(['message'=>"Berhasil Import Nilai"]);
    }

    public function self(){
        $user = Auth::user();
        $student_code = intval($user->code) % 10000000;
        $scores = DB::table('scores as sc')->select('s.subject_name','sc.created_at','sc.score_kd','sc.score_type',
                'sc.score_nilai','sc.score_remed','sc.score_na','sc.score_date')
            ->join('subjects as s','s.id','=','sc.score_subject_id')
            ->where('sc.score_student_code',$student_code)->orderBy('sc.updated_at','desc')->paginate(8);

        return response()->json(['scores'=>$scores]);
    }

    public function uploadedActiveYear(Request $request){
        $user = Auth::user();
        $active_year = DB::table('years')->where('year_isActive','y')->first();
        if(in_array($user->role, ['admin','superadmin'])){
            $scores = DB::table('scores as sc')->join('subjects as s','s.id','=','sc.score_subject_id')
                ->join('users as u','u.code','=','sc.score_student_code')
                ->join('class_user as cu','cu.student_id','=','u.id')
                ->select('sc.*','u.name')
                ->where('cu.class_id',$request->class_id)
                ->where('sc.score_year_id',$active_year->id)
                ->where('sc.score_subject_id',$request->subject_id)
                ->where('sc.score_type',$request->type_value)
                ->get();
        }
        else{
            $scores = DB::table('scores as sc')->join('subjects as s','s.id','=','sc.score_subject_id')
                ->select('s.subject_name','sc.created_at','sc.score_kd')
                ->join('users as u','u.code','=','sc.score_student_code')
                ->join('class_user as cu','cu.student_id','=','u.id')
                ->select('sc.*','u.name')
                ->where('cu.class_id',$request->class_id)
                ->where('sc.score_year_id',$active_year->id)
                ->where('sc.score_subject_id',$request->subject_id)
                ->where('sc.score_type',$request->type_value)
                ->where('score_created_by',$user->id)->get();
        }


        $level_id = DB::table('classes')->where('id',$request->class_id)->value('level_id');
        $bills = DB::table('bills')->where('bill_level_id',$level_id)->where('bill_subject_id',$request->subject_id)->get();
        return response()->json(['scores'=>$scores, 'bills'=>$bills]);
    }

    public function filteredone(Request $request){
        $subject_id = $request->subject_id;
        $class_id = $request->class_id;
        $kd = $request->kd;
        $type = $request->type;
        $active_year = DB::table('years')->where('year_isActive','y')->first();

        $scores = DB::table('scores as sc')->join('users as u','u.code','=','sc.score_student_code')
                    ->join('class_user as cu','u.id','=','cu.student_id')
                    ->where('score_subject_id',$subject_id)
                    ->where('score_kd',$kd)
                    ->where('score_type',$type)
                    ->where('score_year_id',$active_year->id)
                    ->where('cu.class_id',$class_id)
                    ->orderBy('u.name')
                    ->select('u.code','u.name','sc.score_nilai','sc.score_remed','sc.score_na','sc.score_date','sc.updated_at')
                    ->paginate(10);
        return response()->json(['sub'=>$request->subject_id,'cla'=>$request->class_id,'kd'=>$request->kd,'type'=>$request->type,'scores'=>$scores]);
    }

    public function deletefilteredone(Request $request){
        $subject_id = $request->subject_id;
        $class_id = $request->class_id;
        $kd = $request->kd;
        $type = $request->type;
        $active_year = DB::table('years')->where('year_isActive','y')->first();

        $result = DB::table('scores as sc')->join('users as u','u.code','=','sc.score_student_code')
                ->join('class_user as cu','u.id','=','cu.student_id')
                    ->where('score_subject_id',$subject_id)
                    ->where('score_kd',$kd)
                    ->where('score_type',$type)
                    ->where('score_year_id',$active_year->id)
                    ->where('cu.class_id',$class_id)
                    ->orderBy('u.name')->delete();
        if($result)
            return response()->json(['message'=>'Berhasil Hapus Nilai']);
        else
            return response()->json(['message'=>'Ada Masalah'],580);
    }
}