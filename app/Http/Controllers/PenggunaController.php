<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\pengguna;
use Illuminate\Http\Request;
use SweetAlert;


class PenggunaController extends Controller
{
    public function tampilTambah(){

        return view('/admin/pengguna/tambah');
    } 

    public function getPengguna(){
        $penggunas = pengguna::all();

        return view('/admin/pengguna/index', compact('penggunas'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $penggunas = pengguna::where('name','LIKE',"%".$cari."%")->paginate(5);
        return view('/admin/pengguna/index',compact('penggunas'));
    }

    public function addPengguna(Request $request){
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
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->alamat = ucwords($request->alamat);
        $pengguna->no_hp = $request->no_hp;
        $pengguna->save();

        alert()->success('Data Berhasil Di Simpan','Success');
        return redirect('/admin/pengguna/index');

        
    }

    public function deletePengguna($id){
        pengguna::where('id', $id)->delete();

        alert()->error('Data Terhapus','Deleted');
        return redirect('/admin/pengguna/index');
    }

    public function formPengguna($id){
        $pengguna = pengguna::where('id', $id)->first();

        return view('/admin/pengguna/edit', compact('pengguna'));
    }
    public function editPengguna(Request $request,$id){
    $this->validate($request, [
        'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u|unique:pengguna,name,'.$id,
        'email' => 'required|email|unique:pengguna,email,'.$id,
        'alamat' => 'required|min:6',
        'no_hp' => 'required|regex:/(08)[0-9]{10}/|unique:pengguna,no_hp,'.$id,
    ],
    [
        'name.required' => 'Harus Mengisi Bagian Nama !',
        'name.min' => 'Minimal 4 Karakter !',
        'name.regex' => 'Inputan Nama Tidak Valid !',
        'name.unique' => 'Nama Sudah Terdaftar !',
        'email.required' => 'Harus Mengisi Bagian Email !',
        'email.email' => 'Inputan Email Tidak Valid !',
        'email.unique' => 'Email Sudah Terdaftar !',
        'alamat.required' => 'Harus Mengisi Bagian Alamat !',
        'alamat.min' => 'Minimal 6 Karakter !',
        'no_hp.required' => 'Harus Mengisi Bagian No Hp !',
        'no_hp.regex' => 'Nomer Handphone Tidak Valid (Kurang Dari 11 Angka) !',
        'no_hp.unique' => 'Nomer Handphone Sudah Terdaftar !',
    ]);
    pengguna::where('id', $id)
            ->update([
                'name'=>ucwords($request->name),
                'email'=>$request->email,
                'alamat'=>ucwords($request->alamat),
                'no_hp'=>$request->no_hp,
            ]);

    alert()->success('Data Berhasil Di Update','Success');
    return redirect('/admin/pengguna/index');
    }
}
