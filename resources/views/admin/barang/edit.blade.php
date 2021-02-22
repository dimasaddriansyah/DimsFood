@extends('layouts.admin.master')
@section('title', 'Edit Data Makanan')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Data Makanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item text-muted">Data Makanan</li>
                            <li class="breadcrumb-item active"><a href="#">Edit Data Makanan</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{url('/admin/barang/index')}}" class="btn btn-outline-primary"><i class="fas fa-chevron-left mr-2"></i> Kembali</a>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="float-right"><i class="fa fa-clipboard mr-2"></i>{{ $barang->name }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/edit-barang')}}/{{ $barang->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 align-self-center">
                                            <img class="img-fluid rounded mx-auto d-block zoom" src="{{ asset('uploads/'.$barang->image) }}">
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Nama Makanan</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $barang->name }}" style=text-transform: capitalize;>
                                                @if ($errors->has('name')) <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Stok Makanan</label>
                                                <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ $barang->stok }}">
                                                @if ($errors->has('stok')) <span class="invalid-feedback"><strong>{{ $errors->first('stok') }}</strong></span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Makanan</label>
                                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $barang->harga }}" onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);" >Nominal : <span id="format"></span>
                                                @if ($errors->has('harga')) <span class="invalid-feedback"><strong>{{ $errors->first('harga') }}</strong></span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi Makanan</label>
                                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ $barang->keterangan }}" style="text-transform: capitalize;>
                                                @if ($errors->has('keterangan')) <span class="invalid-feedback"><strong>{{ $errors->first('keterangan') }}</strong></span> @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Upload Foto</label>
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                @if ($errors->has('image')) <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span> @endif
                                                <small class="text-muted">*jika ingin mengubah foto</small>
                                            </div>
                                            <button class="btn btn-primary btn-flat btn-block btn-sm">Simpan Data</button>
                                        </div>
                                    </div>
                                </form>
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
