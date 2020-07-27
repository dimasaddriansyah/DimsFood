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

  <title>Admin | Dashboard</title>

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



  @yield('style-ajalah')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
      <li class="col-md-12">
        <a href="{{ url('/keluar') }}">Logout</a>
      </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/tampilan-admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="color : white;" >
          {{ Auth::guard('admin')->user()->name }}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/admin/index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/pengguna/index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Akun Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/barang/index') }}" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Data Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/transaksi/index') }}" class="nav-link active">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Laporan Transaksi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <a href="{{url('/admin/transaksi/index')}}" class="btn btn-primary"><i class="fa fa-arrow-left">Kembali</i></a>
            </div>
                <div class="col-md-12 mt-3">
                    <div class="card" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('bukti_pembayaran')}}/{{ $pesanan->bukti_pembayaran }}" class="mx-auto d-block mt-5" width="300">
                                </div>
                                <div class="col-md-6 mt-5">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td><strong>Tanggal Transaksi</strong></td>
                                                <td width="15px">:</td>
                                                <td>{{ $pesanan->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Pembeli</strong> </td>
                                                <td width="15px">:</td>
                                                <td>{{ $pesanan->pengguna->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Alamat</strong> </td>
                                                <td width="15px">:</td>
                                                <td>{{$pesanan->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Harga</strong> </td>
                                                <td width="15px">:</td>
                                                <td>@currency($pesanan->jumlah_harga)</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status</strong> </td>
                                                <td width="15px">:</td>
                                                <td>
                                                    @if($pesanan->status == 1)
                                                        <span class="badge badge-warning"> Sudah Pesan & Belum Bayar</span>
                                                    @elseif($pesanan->status == 2)
                                                        <span class="badge badge-success"> Pesanan Sedang Di Antar</span>
                                                    @else
                                                        <span class="badge badge-danger"> Gatau</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                    @if($pesanan->status == 2)
                                        <form action="{{ url('/pesananselesai') }}" method="post">
                                            @csrf
                                            <button class="col btn btn-outline-primary btn-sm float-right">Pemesanan Selesai</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
        <!-- /.content -->
      <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>
  @include('sweet::alert')
@yield('script')
</body>
</html>
