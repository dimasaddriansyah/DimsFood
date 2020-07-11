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
            'email' => 'required|unique:pengguna|email',
            'password' => 'required|min:6',
            'alamat' => 'required|min:6',
            'no_hp' => 'required|unique:pengguna|regex:/(08)[0-9]{10}/',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama Pengguna !',
            'name.min' => 'Nama Pengguna Minimal 4 Karakter !',
            'name.unique' => 'Nama Pengguna Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'email.required' => 'Harus Mengisi Bagian Email !',
            'email.unique' => 'Email Sudah Terdaftar !',
            'email.email' => 'Email Tidak Valid !',
            'password.required' => 'Harus Mengisi Bagian Password !',
            'password.min' => 'Password Minimal 6 Karakter !',
            'alamat.required' => 'Harus Mengisi Bagian Alamat !',
            'alamat.min' => 'Alamat Minimal 6 Karakter !',
            'no_hp.required' => 'Harus Mengisi Bagian No Hp !',
            'no_hp.regex' => 'Nomer Handphone Tidak Valid (Kurang Dari 11 Angka) !',
            'no_hp.unique' => 'No Handphone Sudah Terdaftar !',

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
