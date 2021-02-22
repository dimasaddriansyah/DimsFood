<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pesanan;
use App\laporan;
use App\Http\Controllers\PDF;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function getTransaksi(){
        $pesanans = pesanan::where('status','!=',0)->orderBy('status')->get();
        $untung = \App\pesanan::where('status',2)->sum('jumlah_harga');

        return view('/admin/transaksi/index', compact('pesanans', 'untung'));
    }

    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $pesanans = pesanan::where('nama_pembeli','LIKE',"%".$cari."%")->get();
        return view('/admin/transaksi/index',compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id',$id)->first();

        return view('/admin/transaksi/detail', compact('pesanan'));
    }

    public function konfirmasi($id){

        $pesanan = Pesanan::where('id',$id)->first();

        $pesanan->status = 3;
        $pesanan->update();

        alert()->success('Transaksi Telah Dikonfirmasi !', 'Success');
        return redirect()->route('admin.transaksi');
    }

    public function batal($id){

        $pesanan = Pesanan::where('id',$id)->first();

        $pesanan->status = 5;
        $pesanan->update();

        alert()->success('Transaksi Dibatalkan !', 'Success');
        return redirect()->route('admin.transaksi');
    }

    public function selesai($id){

        $pesanan = Pesanan::where('id',$id)->first();

        $pesanan->status = 4;
        $pesanan->update();

        alert()->success('Transaksi Telah Selesai !', 'Success');
        return redirect()->route('admin.transaksi');
    }
}
