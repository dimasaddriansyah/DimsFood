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
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    CountDownTimer('{{$pesanan->tanggal}}', 'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new Date('{{$pesanan->batas_bayar}}');
        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;
        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = '<b>Pesanan Belum Di Bayar</b>';
                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML ='*Segera bayar sebelum : ';
            document.getElementById(id).innerHTML += hours + '<small><b> Jam </></small>';
            document.getElementById(id).innerHTML += minutes + '<small><b> Menit </></small>';
            document.getElementById(id).innerHTML += seconds + '<small><b> Detik </></small>';
        }
        timer = setInterval(showRemaining, 1000);
    }
</script>
</head>
<body>
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
    if(!empty($pesanan_utama4)) {
        $notif4 = $notif2 + $notif3;
    }
?>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand col" href="{{ url('/pengguna/index') }}" style="color: black">
        <h2>Addriansyah Shop</h2>
    </a>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
      </ul>
      <span class="navbar-text float-right">
        <a class="dropdown-item " href="{{ url('/check-out') }}"><i class="fa fa-shopping-cart"></i>
            @if(!empty($notif))
            <span class="badge badge-pill badge-danger align-top">{{$notif}}</span>
            @else
            <span class="badge badge-pill badge-danger align-top">0</span>
            @endif
        </a>
      </span>
      <span class="navbar-text float-right">
        <div class="dropdown col">
            <a class="" data-toggle="dropdown" href="#" style="color: black">
                <i class=" fas fa-bell"></i>
                @if(!empty($notif4))
                <span class="dropdown-toggle badge badge-pill badge-danger align-top">{{$notif4}} Pemberitahuan</span>
                @else
                <span class="dropdown-toggle badge badge-danger align-top">0</span>
                @endif
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ url('history') }}"><i class="fas fa-truck"></i>
                @if(!empty($notif3))
                <span class="badge badge-success align-center">{{$notif3}} Pesanan sedang di antar</span>
                @else
                <span class="badge badge-success align-center"> Tidak pesanan yang sedang di antar</span>
                @endif
              </a>
              <a class="dropdown-item" href="#"><i class="fas fa-coins"></i>
                @if(!empty($notif2))
                <span class="badge badge-warning align-center ml-1">{{$notif2}}  Pesanan belum bayar</span>
                @else
                <span class="badge badge-warning align-center ml-1"> Tidak ada yang pesanan belum bayar</span>
                @endif
              </a>
            </div>
          </div>
      </span>
      <span class="navbar-text float-right">
        <div class="dropdown col">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: black">
                <i class="fa fa-user-alt"></i>  {{ Auth::guard('pengguna')->user()->name }}
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ url('history') }}"><i class="fa fa-list"></i> Riwayat Pemesanan</a>
              <a class="dropdown-item" href="{{ url('/ubahakun') }}/{{ Auth::guard('pengguna')->user()->id }}"><i class="fa fa-user-edit"></i> Ubah Akun</a>
              <a class="dropdown-item" href="{{ url('/keluar') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </div>
      </span>
    </div>
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
                                <h3 style="color : green">Pesanan Sukses</h3>
                                <h5>Pesanan anda sudah dicheck out selanjutnya untuk pembayaran silahkan transfer
                                di rekening <br><strong>Bank BNI Nomer Rekening : <strong style="color: blue">32113-812145-456</strong> </strong>
                                dengan nominal : <strong style="color: blue">@currency($pesanan->jumlah_harga)</strong><br><br>
                                <b id="countdown" style="color: red;"></b>
                                </h5>
                            @elseif($pesanan->status == 2)
                                <h3 style="color : green">Pembayaran Sukses !</h3>
                                <h5>Pesanan akan di kirim sesuai alamat tujuan anda <strong style="color: blue">{{ Auth::guard('pengguna')->user()->alamat }}</strong>
                                Perkiraan Sampai <b style="color: blue">2-3 Hari Jam Kerja</b><br>
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
                            <p align="right"><strong>Tanggal Pesan : {{ $pesanan->tanggal }}</strong></p>
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
                                @if($pesanan->status == 1)
                                    <form action="{{ url('upload_bukti')}}/{{ $pesanan->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-3">
                                        <label>Nama Pembeli</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">@</span>
                                            </div>
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::guard('pengguna')->user()->name }}" readonly>
                                            @if ($errors->has('name')) <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Alamat Lengkap Pembeli</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ Auth::guard('pengguna')->user()->alamat }}">
                                            @if ($errors->has('alamat')) <span class="invalid-feedback"><strong>{{ $errors->first('alamat') }}</strong></span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>No Hp Pembeli</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input name="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" value="{{ Auth::guard('pengguna')->user()->no_hp }}">
                                            @if ($errors->has('no_hp')) <span class="invalid-feedback"><strong>{{ $errors->first('no_hp') }}</strong></span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Upload Bukti Pembayaran</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                                            </div>
                                            <input name="bukti_pembayaran" type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror">
                                            @if ($errors->has('bukti_pembayaran')) <span class="invalid-feedback"><strong>{{ $errors->first('bukti_pembayaran') }}</strong></span> @endif
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-flat btn-block btn-sm">Upload</button>
                                    </form>

                                @elseif($pesanan->status == 2)
                                <div class="form-group mt-3">
                                    <label>Nama Pembeli</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ Auth::guard('pengguna')->user()->name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Alamat Lengkap Pembeli</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ Auth::guard('pengguna')->user()->alamat }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label>No Hp Pembeli</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ Auth::guard('pengguna')->user()->no_hp }}" readonly>
                                    </div>
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



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>
@include('sweet::alert')

</body>
</html>
