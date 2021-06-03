<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets_admin/css/components.css')}}">

</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form action="{{ route('registerPost') }}" method="post">
                @csrf
                  <div class="form-group">
                    <label for="name" class="@error('name') text-danger @enderror">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="email" class="@error('email') text-danger @enderror">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block @error('password') text-danger @enderror">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                      @if ($errors->has('password'))
                          <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                      @endif
                    </div>

                    <div class="form-group col-6">
                      <label for="password-confirm" class="d-block @error('password-confirm') text-danger @enderror">Password Confirmation</label>
                      <input type="password" class="form-control @error('password-confirm') text-danger @enderror" name="password-confirm">
                      @if ($errors->has('password-confirm'))
                          <span class="invalid-feedback"><strong>{{ $errors->first('password-confirm') }}</strong></span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phone_number" class="@error('phone_number') text-danger @enderror">Phone Number</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{old('phone_number')}}">
                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('phone_number') }}</strong></span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="address" class="@error('address') text-danger @enderror">Full Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}">
                    @if ($errors->has('address'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('address') }}</strong></span>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                    <a href="{{route('login')}}" class="btn btn-outline-secondary btn-lg btn-block">
                        Back
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets_admin/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{asset('assets_admin/js/scripts.js')}}"></script>
  <script src="{{asset('assets_admin/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('assets_admin/js/page/auth-register.js') }}"></script>

</body>
</html>
