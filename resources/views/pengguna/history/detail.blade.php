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
            <div class="col-md-12 mt-3">
                <a href="{{url('history')}}" class="btn btn-primary"><i class="fa fa-arrow-left">Kembali</i></a>
            </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            @if($pesanan->status == 1)
                                <h3 style="color : green">Pemesanan Sukses</h3>
                                <h5>Pesanan anda sudah dicheck out selanjutnya untuk pembayaran silahkan transfer
                                di rekening <br><strong>Bank BNI Nomer Rekening : <strong style="color: blue">32113-812145-456</strong> </strong> 
                                dengan nominal : <strong style="color: blue">@currency($pesanan->jumlah_harga)</strong></h5>
                            @elseif($pesanan->status == 2)
                                <h3 style="color : green">Pembayaran Sukses !</h3>
                                <h5>Pesanan akan di kirim sesuai alamat tujuan anda <strong style="color: blue">{{ Auth::guard('pengguna')->user()->alamat }}</strong><br>
                                Terima Kasih <strong style="color: blue">{{ Auth::guard('pengguna')->user()->name }}</strong></h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3><i class="fa fa-shopping-cart"></i>Detail Pemesanan</h3>
                            @if(!empty($pesanan))
                            <p align="right"><strong>Tanggal Pesan : {{ $pesanan->created_at }}</strong></p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <img src="{{ url('uploads') }}//{{ $pesanan_detail->barang->image}}" width="100">
                                            </td>
                                            <td>{{ $pesanan_detail->barang->name }}</td>
                                            <td>{{ $pesanan_detail->jumlah }}</td>
                                            <td align="left">@currency($pesanan_detail->barang->harga)</td>
                                            <td align="left"><strong>@currency($pesanan_detail->jumlah_harga)</strong></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" align="right"><strong>Total yang harus di bayar :</strong></td>
                                            <td><strong>@currency($pesanan->jumlah_harga)</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3><i class="fa fa-upload"></i> Upload Bukti Pembayaran</h3>
                            @if ($errors->any())
                            <div class="alert alert-danger" align="left">
                                <ul>
                                    <p>Terjadi Kesalahan !</p>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                          @endif
                                @if($pesanan->status == 1)
                                    <form action="{{ url('upload_bukti')}}/{{ $pesanan->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-group mt-3">
                                        <label>Nama Pembeli</label>
                                        <input type="text" name="nama_pembeli" class="form-control" value="{{ Auth::guard('pengguna')->user()->name }}" readonly>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Alamat Pembeli</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ Auth::guard('pengguna')->user()->alamat }}" readonly>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Upload Bukti Pembayaran</label>
                                        <input type="file" name="bukti_pembayaran" class="form-control">
                                    </div>
                                    <button class="btn btn-primary btn-flat btn-block btn-sm">Upload</button>
                                    </form>

                                @elseif($pesanan->status == 2)
                                    <div class="form-group mt-3">
                                        <label>Nama Pembeli</label>
                                        <input type="text" class="form-control" value="{{ Auth::guard('pengguna')->user()->name }}" readonly>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Alamat Pembeli</label>
                                        <input type="text" class="form-control" value="{{ Auth::guard('pengguna')->user()->alamat }}" readonly>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Upload Bukti Pembayaran</label>
                                        <center>
                                            <img src="{{ url('bukti_pembayaran')}}/{{ $pesanan->bukti_pembayaran }}" width="400" height="300">
                                        </center>
                                    </div>
                                @endif
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
