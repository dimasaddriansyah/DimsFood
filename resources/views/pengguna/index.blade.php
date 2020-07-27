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
                    <span class="dropdown-toggle badge badge-pill badge-danger align-top">{{$notif4}}</span>
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
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: black; cursor: pointer;">
                    <i class="fa fa-user-alt"></i>  {{ Auth::guard('pengguna')->user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ url('history') }}"><i class="fa fa-list"></i> Riwayat Pemesanan</a>
                  <a class="dropdown-item" href="{{ url('/ubahakun') }}/{{ Auth::guard('pengguna')->user()->id }}"><i class="fa fa-user-edit"></i> Ubah Profil</a>
                  <a class="dropdown-item" href="{{ url('/keluar') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
              </div>
          </span>
        </div>
      </nav>
    <div class="container">
        <h4 class="mt-4">Daftar Menu Makanan</h4>
        <div class="row justify-content-center">
            @foreach ($barangs as $barang)
            <div class="col md-4 mt-5" id="col1">
                <div id="card1" class="zoom">
                    <center>
                        <img src="{{ url('uploads')}}/{{ $barang->image }}" class="img-card-top mt-4" style="width: 250px;
                        height: 200px;" >
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
                            <button class="btn btn-danger" disabled><i class="fas fa-shopping-cart"></i> Pesan</button>
                        @else
                            <a href="{{ url('pesan')}}/{{$barang->id}}" id="btn1" class="btn btn-primary"><i class="fa fa-shopping-cart"> Pesan</i></a>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
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
