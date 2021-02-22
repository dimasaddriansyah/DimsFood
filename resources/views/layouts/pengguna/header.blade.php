<?php
    $pesanan_utama = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',0)->first();
    $pesanan_utama2 = \App\pesanan::where('pengguna_id', Auth::user()->id)->first();
    $pesanan_utama3 = \App\pesanan::where('pengguna_id', Auth::user()->id)->first();
    $pesanan_utama4 = \App\pesanan::where('pengguna_id', Auth::user()->id)->first();

    if(!empty($pesanan_utama)){
        $notif = \App\pesanan_detail::where('pesanan_id', $pesanan_utama->id)->count();
    }
    if(!empty($pesanan_utama2)) {
        $notif2 = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',1)->count();
    }
    if(!empty($pesanan_utama3)) {
        $notif3 = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',2)->count();
    }
    // Pertambahan Notif Belum Bayar dan Sedang Diantar
    if(!empty($pesanan_utama4)) {
        $notif4 = $notif2 + $notif3;
    }
?>

<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ url('/pengguna/index') }}" style="color: black">
        <h2>Dims Food</h2>
    </a>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        </ul>
        <span>
        <div class="dropdown mr-2">
            <a class="" href="{{ url('/check-out') }}" style="color: black">
                <i class=" fas fa-shopping-cart"></i>
                @if(!empty($notif))
                    <span class="badge badge-pill badge-danger align-top">{{$notif}}</span>
                @endif
            </a>
            </div>
        </span>
        <span class="navbar-text float-right">
        <div class="dropdown">
            <a class="" href="{{ url('history') }}" style="color: black">
                <i class=" fas fa-bell"></i>
                @if(!empty($notif4))
                    <span class="badge badge-pill badge-danger align-top">{{$notif4}}</span>
                @endif
            </a>
            </div>
        </span>
        <span class="navbar-text float-right">
        <div class="dropdown col">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: black; cursor: pointer;">
                <i class="fa fa-user-alt mr-2"></i>  {{ Auth::guard('pengguna')->user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ url('history') }}"><i class="fa fa-list mr-2"></i> Riwayat Pemesanan</a>
                <a class="dropdown-item" href="{{ url('/ubahakun') }}"><i class="fa fa-user-edit mr-2"></i>Ubah Akun</a>
                <a class="dropdown-item" href="{{ url('/keluar') }}" style="color: red"><i class="fas fa-sign-out-alt mr-2" style="color: red"></i> Logout</a>
            </div>
            </div>
        </span>
    </div>
</nav>
