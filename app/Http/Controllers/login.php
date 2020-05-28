<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\pengguna;
use Auth;
use SweetAlert;

class login extends Controller
{
    public function index(){
 
        return view('/masuk');
    }

    function masuk(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            alert()->basic('Anda Login Sebagai Admin', 'Hello');
            return redirect()->intended('/admin/index');
        }else if (Auth::guard('pengguna')->attempt(['email' => $request->email, 'password' => $request->password])) {
            alert()->basic('Anda Login Sebagai Pengguna', 'Hello');
            return redirect()->intended('/pengguna/index');
        }else{
            //Gagal Login
            alert()->error('Password atau Email, Salah !', 'Gagal Login !');
            return redirect('/masuk')->with('alert','Password atau Email, Salah !');
        }
    }

    function keluar()
    {   
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }else if(Auth::guard('pengguna')->check()){
            Auth::guard('pengguna')->logout();
        }
        return redirect('/masuk')->with('alert','Kamu sudah logout'); 
    }
}
