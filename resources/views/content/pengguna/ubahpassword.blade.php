@extends('layouts.pengguna.master')
@section('title', 'Ubah Password')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row">
                            <div class="col-6 mt-2">
                                <h4><i class="fa fa-user-edit mr-2"></i> Ubah Password</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @if ($errors->has('password')) <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span> @endif
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword">
                                @if ($errors->has('newPassword')) <span class="invalid-feedback"><strong>{{ $errors->first('newPassword') }}</strong></span> @endif
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword">
                                @if ($errors->has('confirmPassword')) <span class="invalid-feedback"><strong>{{ $errors->first('confirmPassword') }}</strong></span> @endif
                            </div>
                            <button class="btn btn-success btn-block mt-4">Ubah Password</button>
                            <a href="{{ url('ubahakun') }}" class="btn btn-outline-secondary btn-block">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
