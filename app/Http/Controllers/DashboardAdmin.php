<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admins;
use App\Models\pesanan;
use App\Models\products;
use App\Models\users;

class DashboardAdmin extends Controller
{
    public function tampil()
    {
        $admins  = admins::get();
        $users = users::get();
        $barang = products::get();
        $pesanan = pesanan::get();
        $pending = pesanan::where('status',2)->get();

        return view('content.admin.index', compact('admins', 'users',  'barang', 'pesanan', 'pending'));
    }

    public function getUsers(){
        $users = users::get();

        return view('content.admin.pengguna.index', compact('users'));
    }
}
