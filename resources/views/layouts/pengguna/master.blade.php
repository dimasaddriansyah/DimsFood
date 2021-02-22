<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    @yield('after-styles')

</head>
<body style="background-color: #ffffff">
    {{-- Header --}}
    @include('layouts.pengguna.header')
    {{-- /Header --}}
    
    <div class="container">
        {{-- Content --}}
            @yield('content')
        {{-- /Content --}}
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweet::alert')
    @yield('after-script')

</body>
</html>
