<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pesanan;
use App\barang;
use App\pesanan_detail;
use SweetAlert;
use Auth;
use Carbon\Carbon;
use PDF;



class DashboardPenggunaController extends Controller
{
    
    public function index()
    {
        $barangs = Barang::paginate(10);

        return view('pengguna.index', compact('barangs'));
    }

    public function tampilpesan($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('pengguna.tampilpesan', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();

        //validasi apakah MELEBIHI STOK
        if($request->jumlah_pesan > $barang->stok){
            alert()->error('Melebihi Batas Stok Bos', 'Error');
            return redirect('pesan/'.$id);
        }

        //cek VALIDASI
        $cek_pesanan = pesanan::where('pengguna_id', Auth::user()->id)->where('status',0)->first();
        //simpan ke database PESANAN
        if(empty($cek_pesanan)){
            $pesanan = new pesanan;
            $pesanan->pengguna_id       = Auth::user()->id;
            $pesanan->status        = 0;
            $pesanan->jumlah_harga  = 0;
            $pesanan->save();
        }

        //simpan ke database PESANAN_DETAIL
        $pesanan_baru = pesanan::where('pengguna_id', Auth::user()->id)->where('status',0)->first();

        //cek PESANAN DETAIL
        $cek_pesanan_detail = pesanan_detail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){
            $pesanan_detail = new pesanan_detail;
            $pesanan_detail->barang_id      = $barang->id;
            $pesanan_detail->pesanan_id     = $pesanan_baru->id;
            $pesanan_detail->jumlah         = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga   = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->save();
        }else{
            $pesanan_detail = pesanan_detail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah         = $pesanan_detail->jumlah+$request->jumlah_pesan;

            //HARGA SEKARANG
            $harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga   = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah TOTAL
        $pesanan = pesanan::where('pengguna_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
        $pesanan->update();
        
        //Alert::success('Pesanan Sukses Masuk Keranjang', 'Success');
        return redirect('check-out');
    }

    public function check_out()
    {
        $pesanan = pesanan::where('pengguna_id', Auth::user()->id)->where('status',0)->first();
        if(!empty($pesanan))
        {
            $pesanan_details  = pesanan_detail::where('pesanan_id', $pesanan->id)->get();
            return view('pengguna.check_out', compact('pesanan', 'pesanan_details'));
        }
        return view('pengguna/check_out');

    }

    public function delete($id)         
    {
        $pesanan_detail = pesanan_detail::where('id', $id)->first();
        $pesanan = pesanan::where('id', $pesanan_detail->pesanan->id)->first();

        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        return redirect('check-out');
        
    }

    public function konfirmasi()
    {
        $pesanan = pesanan::where('pengguna_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = pesanan_detail::where('pesanan_id', $pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail){
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_detail->jumlah;
            $barang->update();
        }
        //Alert::success('Pesanan Suskses Check Out Silahkan Bayar', 'Success');
        return redirect('history/'.$pesanan->id);
    }

    public function history()
    {
        $pesanans = pesanan::where('pengguna_id', Auth::user()->id)->where('status','!=',0)->get();
        
        return view('pengguna.history.index', compact('pesanans'));
    }

    public function historydetail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details  = pesanan_detail::where('pesanan_id', $pesanan->id)->get();
        
        return view('pengguna.history.detail', compact('pesanan','pesanan_details'));
    }
}
