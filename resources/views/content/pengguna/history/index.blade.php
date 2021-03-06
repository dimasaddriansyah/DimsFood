@extends('layouts.pengguna.master')
@section('title', 'Riwayat Pesanan')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row">
                            <div class="col-6 mt-2">
                                <h4><i class="fa fa-shopping-cart mr-2"></i> Riwayat Pemesanan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Tanggal</th>
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
                                            <span class="badge badge-warning"> Sudah Pesan & Belum Bayar</span>
                                        @elseif($pesanan->status == 2)
                                            <span class="badge badge-info"> Menunggu Konfirmasi</span>
                                        @elseif($pesanan->status == 3)
                                            <span class="badge badge-success"> Pesanan Berhasil & Sedang Diantar</span>
                                        @elseif($pesanan->status == 4)
                                            <span class="badge badge-success"> Pesanan Sampai Ditujuan</span>
                                        @elseif($pesanan->status == 5)
                                            <span class="badge badge-danger"> Pesanan Ditolak</span>
                                        @else
                                            <span class="badge badge-danger"> Gatau Kemana hehe keksi ilang hehe</span>
                                        @endif
                                    </td>
                                    <td>@currency($pesanan->jumlah_harga)</td>
                                    <td>
                                        <a href="{{ url('history')}}/{{ $pesanan->id}}" class="btn btn-primary"><i class="fa fa-info mr-2"></i> Detail</a>
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
@endsection
