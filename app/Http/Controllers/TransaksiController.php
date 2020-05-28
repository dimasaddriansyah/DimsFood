<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pesanan;
use App\laporan;
use App\Http\Controllers\PDF;

class TransaksiController extends Controller
{
    public function getTransaksi(){
        $pesanans = pesanan::all();

        return view('/admin/transaksi/index', compact('pesanans'));
    }

    public function search(Request $request)
    {
        $cari = $request->get('cari');
        $pesanans = pesanan::where('nama_pembeli','LIKE',"%".$cari."%")->get();
        return view('/admin/transaksi/index',compact('pesanans'));
    }
}
