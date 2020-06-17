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
        $barangs = barang::orderBy('stok')->get();
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
            'stok' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:1',
            'keterangan' => 'required|min:5',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama Barang!',
            'name.min' => 'Nama Barang Minimal 4 Karakter !',
            'name.unique' => 'Nama Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'stok.required' => 'Harus Mengisi Bagian Stok !',
            'stok.numeric' => 'Harus Pakai Nomer !',
            'stok.min' => 'Stok Tidak Boleh Minus atau Kosong !',
            'harga.min' => 'Harga Tidak Boleh Minus atau Kosong !',
            'harga.required' => 'Harus Mengisi Bagian Harga !',
            'keterangan.required' => 'Harus Mengisi Bagian Keterangan !',
            'keterangan.min' => 'Keterangan Minimal 5 Karakter !',
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
        $barang->keterangan = ucwords($request->keterangan);
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:4|unique:barang,name,'.$id,
            'stok' => 'required|numeric|min:1',
            'harga' => 'required|min:1',
            'keterangan' => 'required|min:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'name.required' => 'Harus Mengisi Bagian Nama Barang!',
            'name.min' => 'Nama Barang Minimal 4 Karakter !',
            'name.unique' => 'Nama Sudah Terdaftar !',
            'name.regex' => 'Inputan Nama Tidak Valid !',
            'stok.required' => 'Harus Mengisi Bagian Stok !',
            'stok.numeric' => 'Harus Pakai Nomer !',
            'stok.min' => 'Stok Tidak Boleh Minus atau Kosong !',
            'harga.min' => 'Harga Tidak Boleh Minus atau Kosong !',
            'harga.required' => 'Harus Mengisi Bagian Harga !',
            'keterangan.required' => 'Harus Mengisi Bagian Keterangan !',
            'keterangan.min' => 'Keterangan Minimal 5 Karakter !',
        ]);
       
        $barang = barang::find($id);  
        $barang->name = ucwords($request->name);
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->keterangan = ucwords($request->keterangan);

        if (empty($request->image)){
            $barang->image = $barang->image;
        }
        else{
            unlink('uploads/'.$barang->image); //menghapus file lama
            $file = $request->file('image'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('uploads',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $barang->image = $nama_file;
        }
        $barang->save();
        alert()->success('Data Berhasil Di Update !', 'Success');
        return redirect('/admin/barang/index');
    }
}
