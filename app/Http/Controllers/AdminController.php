<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;

class AdminController extends Controller
{
    public function tampilTambah(){

        return view('/admin/admin/tambah');
    } 

    public function getAdmin(){
        $admins = admin::paginate(5);

        return view('/admin/admin/index', compact('admins'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $admins = admin::where('name','LIKE',"%".$cari."%")->paginate(5);
        return view('/admin/admin/index',compact('admins'));
    }

    public function addAdmin(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:admin|min:4|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:admin|email',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama Admin !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.unique' => 'Nama Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'email.required' => 'Harus Mengisi Bagian Email !',
            'email.unique' => 'Email Sudah Terdaftar !',
            'email.email' => 'Inputan Email Tidak Valid!',
        ]);

        $admin = new admin();

        $admin->name = ucwords($request->name);
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

        alert()->success('Data Berhasil Di Simpan','Success');
        return redirect('/admin/admin/index');

        
    }

    public function deleteAdmin($id){
        admin::where('id', $id)->delete();

        alert()->error('Data Terhapus','Deleted');
        return redirect('/admin/admin/index');
    }

    public function formAdmin($id){
        $admin = admin::where('id', $id)->first();

        return view('/admin/admin/edit', compact('admin'));
    }
    public function editAdmin(Request $request,$id){
    $this->validate($request, [
        'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
        'email' => 'required|email',
        'alamat' => 'required|min:6',
        'no_hp' => 'required|min:10|numeric',
    ],
    [
        'name.required' => 'Harus Mengisi Bagian Nama !',
        'name.min' => 'Minimal 4 Karakter !',
        'name.regex' => 'Inputan Nama Tidak Valid !',
        'email.required' => 'Harus Mengisi Bagian Email !',
        'alamat.required' => 'Harus Mengisi Bagian Alamat !',
        'alamat.min' => 'Minimal 6 Karakter !',
        'no_hp.required' => 'Harus Mengisi Bagian No Hp !',
        'no_hp.min' => 'Minimal 10 Karakter !',
        'no_hp.numeric' => 'Harus Pakai Nomer !',
    ]);
    admin::where('id', $id)
            ->update([
                'name'=>ucwords($request->name),
                'email'=>$request->email,
                'alamat'=>ucwords($request->alamat),
                'no_hp'=>$request->no_hp,
            ]);

    alert()->success('Data Berhasil Di Update','Success');
    return redirect('/admin/admin/index');
    }
}
