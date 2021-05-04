<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets_home/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets_home/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets_home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_home/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_home/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_home/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_home/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_home/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets_home/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- =======================================================
  * Template Name: Delicious - v2.2.1
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
    @include('layouts.user.header')
  <!-- ======= End Header ======= -->

  <!-- ======= Content ======= -->
    @yield('content')
  <!-- ======= End Content ======= -->

  <!-- ======= Footer ======= -->
    @include('layouts.user.footer')
  <!-- ======= Footer ======= -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets_home/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets_home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets_home/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets_home/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets_home/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('assets_home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets_home/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets_home/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets_home/js/main.js') }}"></script>

</body>

</html>
