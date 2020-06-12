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
    public function register(){
 
        return view('/register');
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

    public function masukregister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:pengguna|min:4|regex:/^[\pL\s\-]+$/u',
            'alamat' => 'required|min:4',
            'no_hp' => 'required|min:10|numeric',
            'email' => 'required|email|unique:pengguna',
            'password' => 'required|min:5',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.unique' => 'Nama Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'alamat.required' => 'Harus Mengisi Bagian Alamat !',
            'alamat.min' => 'Minimal 4 Karakter !',
            'no_hp.required' => 'Harus Mengisi Bagian Harga !',
            'no_hp.min' => 'Minimal 10 Karakter', 
            'no_hp.numeric' => 'Harus Mengisi Dengan Angka !',
            'email.required' => 'Harus Mengisi Bagian Email !',
            'email.email' => 'Inputan Email Tidak Valid !',
            'email.unique' => 'Email Sudah Terdaftar !',
            'password.required' => 'Harus Mengisi Bagian Password !',
            'password.min' => 'Minimal 5 Karakter !',
        ]);

        $pengguna = new pengguna();
        $pengguna->name = ucwords($request->name);
        $pengguna->alamat = ucwords($request->alamat);
        $pengguna->no_hp = $request->no_hp;
        $pengguna->email = ucwords($request->email);
        $pengguna->password = bcrypt($request->password);
        $pengguna->save();
        
        alert()->success('Berhasil Register', 'Success');
        return redirect('/masuk');
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
