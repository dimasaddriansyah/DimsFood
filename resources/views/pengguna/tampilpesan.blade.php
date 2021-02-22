@extends('layouts.pengguna.master')
@section('title', 'Detail Makanan')
@section('content')
    <div class="container">
        <div class="card mt-3" >
            <div class="card-header bg-transparent">
                <div class="row">
                    <div class="col-6">
                        <a href="{{url('/admin/barang/index')}}" class="btn btn-outline-success"><i class="fas fa-chevron-left mr-2"></i> Kembali</a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="btn btn float-right text-md"><i class="fa fa-clipboard mr-2"></i> Detail {{ $barang->name }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <img src="{{ url('uploads')}}/{{ $barang->image}}" class="img-fluid rounded mx-auto d-block zoom">
                    </div>
                    <div class="col-6 align-self-center">
                        <h2>{{$barang->name}}</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td><strong>Harga</strong></td>
                                    <td width="15px">:</td>
                                    <td>@currency($barang->harga)</td>
                                </tr>
                                <tr>
                                    <td><strong>Stok</strong> </td>
                                    <td width="15px">:</td>
                                    <td>{{($barang->stok)}} </td>
                                </tr>
                                <tr>
                                    <td><strong>Deskripsi</strong> </td>
                                    <td width="15px">:</td>
                                    <td>{{($barang->keterangan)}} </td>
                                </tr>
                                <tr>
                                    <td><strong>Jumlah Pesan</strong> </td>
                                    <td width="15px">:</td>
                                    <td>
                                        <form action="{{url('pesan')}}/{{$barang->id}}" method="post">
                                            @csrf
                                            <input type="number" name="jumlah_pesan" class="form-control @error('jumlah_pesan') is-invalid @enderror" autofocus>
                                            @if ($errors->has('jumlah_pesan')) <span class="invalid-feedback"><strong>{{ $errors->first('jumlah_pesan') }}</strong></span> @endif
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                            <button type="submit" class="btn btn-success btn-block mt-3"><i class="fa fa-shopping-cart mr-2"></i> Masukan Keranjang</button>
                        </form>
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
        }
        .zoom:hover {
            transform: scale(1.03); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
@endpush

