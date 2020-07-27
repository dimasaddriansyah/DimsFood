<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Halaman Pengguna</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/tampilan-admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/dash/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.addons.css')}}">
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <li class="col-md-12">
                 <h3>Addriansyah Shop</h3>
                </li>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->

          <li class="nav-item">
          <li class="col-md-12">
            <?php
                $pesanan_utama = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',0)->first();
                $pesanan_utama2 = \App\pesanan::where('pengguna_id', Auth::user()->id)->first();
                $pesanan_utama3 = \App\pesanan::where('pengguna_id', Auth::user()->id)->first();


                if(!empty($pesanan_utama)){
                    $notif = \App\pesanan_detail::where('pesanan_id', $pesanan_utama->id)->count();
                }
                if (!empty($pesanan_utama2)) {
                    $notif2 = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',1)->count();
                }
                if (!empty($pesanan_utama3)) {
                    $notif3 = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',2)->count();
                }
            ?>
                <a class="mr-4" href="{{ url('history') }}" style="color: black"><i class="fas fa-truck"></i>
                    @if(!empty($notif3))
                    <span class="badge badge-success">{{$notif3}} pesanan sedang di antar</span>
                    @endif
                </a>
                <a class="mr-4" href="{{ url('check-out') }}" style="color: black"><i class="fa fa-shopping-cart"></i>
                    @if(!empty($notif))
                    <span class="badge badge-danger">{{$notif}} keranjang</span>
                    @endif
                </a>
                <a class="mr-4" href="{{ url('history') }}" style="color: black"><i class="fa fa-coins"></i>
                    @if(!empty($notif2))
                    <span class="badge badge-warning">{{$notif2}} belum bayar</span>
                    @endif
                </a>
              <a class="mr-3" href="{{ url('history') }}"><i class="fa fa-list"></i> Riwayat Pemesanan</a>
              <a class="mr-3"><i class="fa fa-user-alt"></i> {{ Auth::guard('pengguna')->user()->name }}</a>
              <a href="{{ url('/keluar') }}">Logout</a>
          </li>
          </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('pengguna/index')}}" class="btn btn-primary"><i class="fa fa-arrow-left">Kembali</i></a>
            </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-shopping-cart"></i>Riwayat Pemesanan</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Pesananan</th>
                                            <th>Status</th>
                                            <th>Jumlah Harga</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($pesanans as $pesanan)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pesanan->tanggal}}</td>
                                            <td>
                                                @if($pesanan->status == 1)
                                                    <span class="badge badge-warning"> Sudah Pesan & Belum Bayar</span><br>
                                                @elseif($pesanan->status == 2)
                                                    <span class="badge badge-success"> Sudah Bayar Dong</span>
                                                @else
                                                    <span class="badge badge-danger"> Gatau</span>
                                                @endif
                                            </td>
                                            <td>Rp. {{ number_format($pesanan->jumlah_harga)}}</td>
                                            <td>
                                                <a href="{{ url('history')}}/{{ $pesanan->id}}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>
@include('sweet::alert')

</body>
</html>
