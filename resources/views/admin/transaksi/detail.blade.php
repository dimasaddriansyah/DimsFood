@extends('layouts.admin.master')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Data Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item text-muted">Data Transaksi</li>
                            <li class="breadcrumb-item active"><a href="#">Detail Data Transaksi</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{url('/admin/transaksi/index')}}" class="btn btn-outline-primary"><i class="fas fa-chevron-left mr-2"></i> Kembali</a>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="float-right"><i class="fa fa-clipboard mr-2"></i>Transaksi {{ $pesanan->pengguna->name }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 align-self-center">
                                        <img src="{{ url('bukti_pembayaran')}}/{{ $pesanan->bukti_pembayaran }}" class="img-fluid mx-auto d-block zoom">
                                    </div>
                                    <div class="col-6">
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
                                                    <td><strong>No Handphone</strong> </td>
                                                    <td width="15px">:</td>
                                                    <td>{{$pesanan->no_hp}}</td>
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
                                                            <span class="badge badge-info"> Menunggu Konfirmasi <i class="fas fa-pause ml-2"></i></span>
                                                        @elseif($pesanan->status == 3)
                                                            <span class="badge badge-success"> Pesanan Berhasil & Sedang Diantar <i class="fas fa-truck ml-2"></i></span>
                                                        @elseif($pesanan->status == 4)
                                                            <span class="badge badge-success"> Pesanan Sampai Ditujuan <i class="fas fa-check ml-2"></i></span>
                                                        @elseif($pesanan->status == 5)
                                                            <span class="badge badge-danger"> Pesanan Ditolak <i class="fas fa-times ml-2"></i></span>
                                                        @else
                                                            <span class="badge badge-danger"> Gatau Kemana hehe keksi ilang hehe</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>
                                        @if($pesanan->status == 2)
                                            <form action="{{ url('pesananKonfirmasi')}}/{{ $pesanan->id }}" method="post">
                                                @csrf
                                                <button class="col btn btn-primary btn-sm float-right mb-2">Pesanan Dikonfirmasi</button>
                                            </form>
                                            <form action="{{ url('/pesananBatal') }}/{{ $pesanan->id }}" method="post">
                                                @csrf
                                                <button class="col btn btn-outline-danger btn-sm float-right">Pesanan Ditolak</button>
                                            </form>
                                        @elseif($pesanan->status == 3)
                                            <form action="{{ url('/pesananSelesai') }}/{{ $pesanan->id }}" method="post">
                                                @csrf
                                                <button class="col btn btn-success btn-sm float-right">Pesanan Telah Selesai</button>
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
    </div>
@endsection

@push('after-styles')
    <style>
        .zoom {
            transition: transform 1s; /* Animation */
            margin: 0 auto;
        }
        .zoom:hover {
            transform: scale(1.03); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
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
            return (((sign)?'':'-') + 'Rp. ' + num);
        }
    </script>
@endpush
