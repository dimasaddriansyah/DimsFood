@extends('layouts.pengguna.master')
@section('title', 'Ubah Profile')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row">
                            <div class="col-6 mt-2">
                                <h4><i class="fa fa-user-edit mr-2"></i> Ubah Profile</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::guard('pengguna')->user()->name }}" style=text-transform: capitalize;>
                                @if ($errors->has('name')) <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span> @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::guard('pengguna')->user()->email }}">
                                @if ($errors->has('email')) <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span> @endif
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ Auth::guard('pengguna')->user()->alamat }}">
                                @if ($errors->has('alamat')) <span class="invalid-feedback"><strong>{{ $errors->first('alamat') }}</strong></span> @endif
                            </div>
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ Auth::guard('pengguna')->user()->no_hp }}">
                                @if ($errors->has('no_hp')) <span class="invalid-feedback"><strong>{{ $errors->first('no_hp') }}</strong></span> @endif
                            </div>
                            <a href="{{ url('ubahPassword') }}" class="btn btn-outline-primary btn-block mt-4">Ubah Password</a>
                            <button class="btn btn-success btn-block">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
