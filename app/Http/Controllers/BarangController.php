<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SweetAlert;



class BarangController extends Controller
{
    public function tampilTambah(){
        $barang = barang::all();

        return view('/admin/barang/tambah', compact('barang'));
    }

    public function getBarang(){
        $barangs = barang::all();
        return view('/admin/barang/index', compact('barangs'));
    }
    
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $barangs = barang::where('name','LIKE',"%".$cari."%")->paginate(5);
        return view('/admin/barang/index',compact('barangs'));
    }

    public function addBarang(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:barang|min:4|regex:/^[\pL\s\-]+$/u',
            'stok' => 'required|numeric',
            'harga' => 'required',
            'keterangan' => 'required|min:5',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.unique' => 'Nama Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'stok.required' => 'Harus Mengisi Bagian Stok !',
            'stok.numeric' => 'Harus Pakai Nomer !',
            'harga.required' => 'Harus Mengisi Bagian Harga !',
            'keterangan.required' => 'Harus Mengisi Bagian Keterangan !',
            'keterangan.min' => 'Minimal 5 Karakter !',
            'image.required' => 'Harus Mengisi Bagian Upload Gambar !',
        ]);

        //Simpan Ke Database Barang
        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'uploads';
        $file -> move($tujuan_upload,$nama_file);

        $barang = new barang();
 
        $barang->name = ucwords($request->name);
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->keterangan = $request->keterangan;
        $barang->image = $nama_file;
        $barang->save();

        alert()->success('Data Berhasil Di Tambah !', 'Success');
        return redirect('/admin/barang/index');
    }

    public function deleteBarang($id){
        barang::where('id', $id)->delete();

        alert()->error('Data Terhapus !', 'Deleted');
        return redirect('/admin/barang/index');
    }

    public function formBarang($id){
        $barang = barang::where('id', $id)->first();

        return view('/admin/barang/edit', compact('barang'));
    }
    public function editBarang(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|min:4|regex:/^[\pL\s\-]+$/u',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama !',
            'name.min' => 'Minimal 4 Karakter !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'stok.required' => 'Harus Mengisi Bagian Stok !',
            'stok.numeric' => 'Harus Pakai Nomer !',
            'harga.required' => 'Harus Mengisi Bagian Harga !',
            'harga.numeric' => 'Harus Pakai Nomer !',
        ]);
        barang::where('id', $id)
                ->update([
                    'name'=>$request->name,
                    'stok'=>$request->stok,
                    'harga'=>$request->harga,
                ]);        

    alert()->success('Data Berhasil Di Update !', 'Success');
    return redirect('/admin/barang/index');
    }
}
