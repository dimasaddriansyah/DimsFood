<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Akun</title>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/tampilan-admin/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/dash/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <?php
    $pesanan_utama = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',0)->first();
    $pesanan_utama2 = \App\pesanan::where('pengguna_id', Auth::user()->id)->first();
    $pesanan_utama3 = \App\pesanan::where('pengguna_id', Auth::user()->id)->first();
    $pesanan_utama4 = \App\pesanan::where('pengguna_id', Auth::user()->id)->first();

    if(!empty($pesanan_utama)){
        $notif = \App\pesanan_detail::where('pesanan_id', $pesanan_utama->id)->count();
    }
    if(!empty($pesanan_utama2)) {
        $notif2 = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',1)->count();
    }
    if(!empty($pesanan_utama3)) {
        $notif3 = \App\pesanan::where('pengguna_id', Auth::user()->id)->where('status',2)->count();
    }
    if(!empty($pesanan_utama4)) {
        $notif4 = $notif2 + $notif3;
    }
?>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand col" href="{{ url('/pengguna/index') }}" style="color: black">
        <h2>Addriansyah Shop</h2>
    </a>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
      </ul>
      <span class="navbar-text float-right">
        <a class="dropdown-item " href="{{ url('/check-out') }}"><i class="fa fa-shopping-cart"></i>
            @if(!empty($notif))
            <span class="badge badge-pill badge-danger align-top">{{$notif}}</span>
            @else
            <span class="badge badge-pill badge-danger align-top">0</span>
            @endif
        </a>
      </span>
      <span class="navbar-text float-right">
        <div class="dropdown col">
            <a class="" data-toggle="dropdown" href="#" style="color: black">
                <i class=" fas fa-bell"></i>
                @if(!empty($notif4))
                <span class="dropdown-toggle badge badge-pill badge-danger align-top">{{$notif4}} Pemberitahuan</span>
                @else
                <span class="dropdown-toggle badge badge-danger align-top">0</span>
                @endif
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ url('history') }}"><i class="fas fa-truck"></i>
                @if(!empty($notif3))
                <span class="badge badge-success align-center">{{$notif3}} Pesanan sedang di antar</span>
                @else
                <span class="badge badge-success align-center"> Tidak pesanan yang sedang di antar</span>
                @endif
              </a>
              <a class="dropdown-item" href="#"><i class="fas fa-coins"></i>
                @if(!empty($notif2))
                <span class="badge badge-warning align-center ml-1">{{$notif2}}  Pesanan belum bayar</span>
                @else
                <span class="badge badge-warning align-center ml-1"> Tidak ada yang pesanan belum bayar</span>
                @endif
              </a>
            </div>
          </div>
      </span>
      <span class="navbar-text float-right">
        <div class="dropdown col">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: black">
                <i class="fa fa-user-alt"></i>  {{ Auth::guard('pengguna')->user()->name }}
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ url('history') }}"><i class="fa fa-list"></i> Riwayat Pemesanan</a>
              <a class="dropdown-item" href="{{ url('/ubahakun') }}/{{ Auth::guard('pengguna')->user()->id }}"><i class="fa fa-user-edit"></i> Ubah Akun</a>
              <a class="dropdown-item" href="{{ url('/keluar') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </div>
      </span>
    </div>
  </nav>

  <div class="container mt-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3><i class="fa fa-user-edit"></i> Ubah Akun</h3>
                <form action="{{ url('') }}" method="post">
                    @csrf
                    <div class="form-group mt-4">
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
                    <button class="btn btn-primary btn-flat btn-block btn-sm">Simpan</button>

                </form>
            </div>
        </div>
    </div>
  </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>
@include('sweet::alert')

</body>
</html>
