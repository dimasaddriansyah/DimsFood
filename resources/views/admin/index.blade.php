@extends('layouts.admin.master')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                    <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                        <h3 class="count">{{ $pengguna->count() }}</h3>

                        <p>Akun Pengguna</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ url('/admin/pengguna/index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                        <h3 class="count">{{ $barang->count() }}</h3>

                        <p>Data Barang</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-cubes"></i>
                        </div>
                        <a href="{{ url('/admin/barang/index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3 class="count">{{ $pesanan->count() }}</h3>

                        <p>Laporan Keuangan</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-chart-line"></i>
                        </div>
                        <a href="{{ url('/admin/transaksi/index') }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <?php
                                $untung = \App\pesanan::where('status',2)->sum('jumlah_harga');
                        ?>
                        <h5>Pendapatan</h5>
                        <h2 class="d-inline">Rp.</h2>
                        <h2 class="count d-inline"><strong>{{ $untung }}</strong></h2>
                        </div>
                        <div class="icon">
                        <i class="fas fa-coins"></i>
                        </div>
                        <a href="" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
