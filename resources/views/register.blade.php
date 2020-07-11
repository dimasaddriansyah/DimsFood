<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('/tampilan-admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/tampilan-admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('/dash/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('/dash/vendors/css/vendor.bundle.addons.css')}}">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/tampilan-login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/tampilan-login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/tampilan-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/tampilan-login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/tampilan-login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/tampilan-login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/tampilan-login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/tampilan-login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/tampilan-login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/tampilan-login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/tampilan-login/css/main.css">
<!--===============================================================================================-->
<script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(/tampilan-login/images/1200x300_Kategori_Lv.1_Peralatan_Rumah_Tangga.jpg);">
					<span class="login100-form-title-1">
						REGISTER
					</span>
				</div>
				<form action="kirimdataregister" method="post">
                    {{ @csrf_field() }}
                    <label class="ml-3 mt-2">Nama</label>
					<div class="input-group mb-3 ml-3">
						<div class="input-group-prepend">
						  <span class="input-group-text">@</span>
						</div>
						<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Nama">
						@if ($errors->has('name')) <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span> @endif
					</div>
					<label class="ml-3">Email</label>
					<div class="input-group mb-3 ml-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter Email">
						@if ($errors->has('email')) <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span> @endif
					</div>
					<label class="ml-3">Password</label>
					<div class="input-group mb-3 ml-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="fas fa-lock"></i></span>
						</div>
						<input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter Password">
						@if ($errors->has('password')) <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span> @endif
					</div>
                    <label class="ml-3">Alamat Lengkap</label>
					<div class="input-group mb-3 ml-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
						</div>
						<input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Enter Alamat">
						@if ($errors->has('alamat')) <span class="invalid-feedback"><strong>{{ $errors->first('alamat') }}</strong></span> @endif
					</div>
					<label class="ml-3">No Hp</label>
					<div class="input-group mb-3 ml-3">
						<div class="input-group-prepend">
						  <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
						</div>
						<input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" placeholder="Enter No Hp">
						@if ($errors->has('no_hp')) <span class="invalid-feedback"><strong>{{ $errors->first('no_hp') }}</strong></span> @endif
					</div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
						</div>
						<div>
							<a href="{{ url('masuk') }}" style="color: blue">Sudah Punya Akun ?</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<center>
							<button class="login100-form-btn ml-3">
								Daftar
							</button>
						</center>
				
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery -->
<script src="{{asset('/tampilan-admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/tampilan-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/tampilan-admin/dist/js/adminlte.min.js')}}"></script>
	
<!--===============================================================================================-->
	<script src="/tampilan-login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/tampilan-login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/tampilan-login/vendor/bootstrap/js/popper.js"></script>
	<script src="/tampilan-login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/tampilan-login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/tampilan-login/vendor/daterangepicker/moment.min.js"></script>
	<script src="/tampilan-login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/tampilan-login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/tampilan-login/js/main.js"></script>
	@include('sweet::alert')


</body>
</html>