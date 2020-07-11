<?php

namespace App\Http\Controllers;

use App\tugas;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TugasController extends Controller
{
    public function tambah(){    
        return view('tugas/tambah');  } 

    public function lihat($id){
    	$tugas = tugas::find($id); 
		return view('tugas/lihat')-> with(array('tugas'=>$tugas));
    }

    public function simpan(Request $request){
    	$tugas= new tugas();
    	$tugas->nama_tugas=$request->nama_tugas;
    	$tugas->end_date= Carbon::now()->addDays(1);
    	$tugas->save();
    	return redirect('tugas/lihat'); 
    }
}