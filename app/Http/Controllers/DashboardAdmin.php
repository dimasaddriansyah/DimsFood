<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\pengguna;
use App\barang;
use App\pesanan;

class DashboardAdmin extends Controller
{
    public function tampil()
    {
        $admin  = admin::get();
        $pengguna = pengguna::get();
        $barang = barang::get();
        $pesanan = pesanan::get();
        
        return view('/admin/index', compact('admin', 'pengguna',  'barang', 'pesanan'));

    }
}
