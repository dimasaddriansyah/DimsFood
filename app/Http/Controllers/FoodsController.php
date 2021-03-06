<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SweetAlert;



class FoodsController extends Controller
{
    public function index()
    {
        $foods = products::where('category','food')->orderBy('stok')->get();
        return view('content.admin.foods.index', compact('foods'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:products|min:4|regex:/^[\pL\s\-]+$/u',
                'stok' => 'required|numeric|min:1',
                'harga' => 'required|numeric|min:1',
                'keterangan' => 'required|min:5',
                'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'name.required' => 'Harus Mengisi Bagian Nama products!',
                'name.min' => 'Nama products Minimal 4 Karakter !',
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
                'image.max' => 'Maksimal Foto 2mb !',
            ]
        );
        //Simpan Ke Database products
        $file = $request->file('image');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'uploads';
        $file->move($tujuan_upload, $nama_file);

        $foods = new products();
        $foods->name = ucwords($request->name);
        $foods->stok = $request->stok;
        $foods->harga = $request->harga;
        $foods->keterangan = ucwords($request->keterangan);
        $foods->image = $nama_file;
        $foods->save();
        alert()->success('Data Berhasil Di Tambah !', 'Success');
        return redirect()->route('foods.index');
    }

    public function deleteproducts($id)
    {
        products::find($id)->delete();

        alert()->error('Data Terhapus !', 'Deleted');
        return redirect()->route('foods.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|min:4|unique:products,name,' . $id,
                'stok' => 'required|numeric|min:1',
                'harga' => 'required|min:1',
                'keterangan' => 'required|min:5',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'name.required' => 'Harus Mengisi Bagian Nama products!',
                'name.min' => 'Nama products Minimal 4 Karakter !',
                'name.unique' => 'Nama Sudah Terdaftar !',
                'name.regex' => 'Inputan Nama Tidak Valid !',
                'stok.required' => 'Harus Mengisi Bagian Stok !',
                'stok.numeric' => 'Harus Pakai Nomer !',
                'stok.min' => 'Stok Tidak Boleh Minus atau Kosong !',
                'harga.min' => 'Harga Tidak Boleh Minus atau Kosong !',
                'harga.required' => 'Harus Mengisi Bagian Harga !',
                'keterangan.required' => 'Harus Mengisi Bagian Keterangan !',
                'keterangan.min' => 'Keterangan Minimal 5 Karakter !',
            ]
        );

        $foods = products::find($id);
        $foods->name = ucwords($request->name);
        $foods->stok = $request->stok;
        $foods->harga = $request->harga;
        $foods->keterangan = ucwords($request->keterangan);

        if (empty($request->image)) {
            $foods->image = $foods->image;
        } else {
            unlink('uploads/' . $foods->image); //menghapus file lama
            $file = $request->file('image'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('uploads', $nama_file); // isi dengan nama folder tempat kemana file diupload
            $foods->image = $nama_file;
        }
        $foods->save();
        alert()->success('Data Berhasil Di Update !', 'Success');
        return redirect()->route('foods.index');
    }
}
