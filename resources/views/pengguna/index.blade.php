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
<!-- Menghitung Nominal Otomatis -->
  <script>
    function formatCurrency(num) {
      num = num.toString().replace(/\$|\,/g,'');
      if(isNaN(num))
      num = "0";
      sign = (num == (num = Math.abs(num)));
      num = Math.floor(num*100+0.50000000001);
      cents = num%100;
      num = Math.floor(num/100).toString();
      if(cents<10)
      cents = "0" + cents;
      for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
      num = num.substring(0,num.length-(4*i+3))+'.'+
      num.substring(num.length-(4*i+3));
      return (((sign)?'':'-') + 'Rp' + num);
    }
</script>
<!-- Menghitung Kembalian Otomatis -->
<script type="text/javascript">
    function startCalculate(){
        interval=setInterval("Calculate()",1);
    }
    function Calculate(){
        var a=document.form1.total_harga.value;
        var c=document.form1.uang_bayar.value;
        document.form1.uang_kembali.value=(c-a);
    }
    function stopCalc(){
        clearInterval(interval);
    }
</script>
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
                if(!empty($pesanan_utama2)) {
                    $notif2 = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',1)->count();
                }
                if(!empty($pesanan_utama3)) {
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
        <h4 class="mt-4">Daftar Menu Makanan</h4>
        <div class="row justify-content-center">
            @foreach ($barangs as $barang)
            <div class="col md-4 mt-5">
                <div class="card">
                    <center>
                        <img src="{{ url('uploads')}}/{{ $barang->image }}" class="img-card-top mt-4" width="180px" height="180px">
                    </center>
                    <div class="card-body mt-2">
                        <h5 class="card-title"><strong> {{ $barang->name }}</strong></h5>
                        <p class="card-text">
                            <table>
                                <tr>
                                    <td><strong>Harga</strong></td>
                                    <td width="15px">:</td>
                                    <td>@currency($barang->harga)</td>
                                </tr>
                                <tr>
                                    <td><strong>Stok</strong></td>
                                    <td width="15px">:</td>
                                    <td>
                                        @if($barang->stok <= 0)
                                            <span class="badge badge-danger">Habis</span>
                                        @else
                                            {{$barang->stok}}</td>
                                        @endif
                                </tr>    
                            </table>
                            <hr>
                        </p>
                        @if($barang->stok <= 0 )
                            <button class="btn btn-primary" disabled><i class="fas fa-shopping-cart"></i> Pesan</button>
                        @else    
                            <a href="{{ url('pesan')}}/{{$barang->id}}" class="btn btn-primary"><i class="fa fa-shopping-cart"> Pesan</i></a>
                        @endif
                    
                    </div>
                </div>
            </div>
            @endforeach
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
