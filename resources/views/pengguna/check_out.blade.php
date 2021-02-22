@extends('layouts.pengguna.master')
@section('title', 'Keranjang')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12 mt-2">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-transparent">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{url('/admin/barang/index')}}" class="btn btn-outline-success"><i class="fas fa-chevron-left mr-2"></i> Kembali</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn float-right text-md"><i class="fa fa-shopping-cart mr-2"></i> Keranjang</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(!empty($pesanan))
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama Makanan</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($pesanan_details as $pesanan_detail)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <img src="{{ url('uploads') }}//{{ $pesanan_detail->barang->image}}" class="zoom" height="100px" width="200px">
                                        </td>
                                        <td>{{ $pesanan_detail->barang->name }}</td>
                                        <td>{{ $pesanan_detail->jumlah }}</td>
                                        <td>@currency($pesanan_detail->barang->harga)</td>
                                        <td>@currency($pesanan_detail->jumlah_harga)</td>
                                        <td>
                                            <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="
                                                return confirm('Anda Yakin Akan Menghapus Data ?');"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                        <td><strong>@currency($pesanan->jumlah_harga)</strong></td>
                                        <td>
                                            <a href="{{ url('konfirmasi-check-out')}}" class="btn btn-success btn-block" onclick="
                                            return confirm('Anda Yakin Untuk Check Out ?');"> Check Out</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="text-center mt-4">
                                <h1 class="text-center mb-3">OPSS !</h1>
                                <h4 class="text-center">Anda Belum Memasan Makanan</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-styles')
    <style>
        .zoom {
            transition: transform 1s; /* Animation */
            margin: 0 auto;
            object-fit: fill;
            object-position: center;
        }
        .zoom:hover {
            transform: scale(1.03); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
@endpush

