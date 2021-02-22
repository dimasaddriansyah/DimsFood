@extends('layouts.pengguna.master')
@section('title', 'Addriansyah Shop')
@section('content')
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"></div>
        <h5 class="mt-4 mb-4">Daftar Menu Makanan</h5>
        <div class="row">
            @foreach ($barangs as $barang)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card rounded mt-4">
                        <div class="rounded">
                            <img src="{{ url('uploads')}}/{{ $barang->image }}" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <strong>{{ $barang->name }}</strong>
                            </div>
                            <div class="card-text">
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
                            </div>
                            @if($barang->stok <= 0 )
                                <button class="btn btn-danger btn-block" disabled><i class="fas fa-ban mr-2"></i> Pesan</button>
                            @else
                                <a href="{{ url('pesan')}}/{{$barang->id}}" class="btn btn-success btn-block"><i class="fa fa-shopping-cart mr-2"></i> Pesan</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('after-styles')
    <style>
        .card-img-top{
            height: 250px;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endpush
