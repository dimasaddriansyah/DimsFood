<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Addriansyah Shop</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-size: 30px;">Addriansyah Shop</a>
            <div>
                <a href="{{ url('/masuk') }}" class="mr-4">Login</a>
                <a href="{{ url('/register') }}" class="btn btn-success" style="border-radius: 5px;">Sign Up</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 align-self-center">
                <h1>Kami Ada Untuk Anda<br>Kapanpun dan Dimanapun.</h1>
                <p class="text-left text-muted mt-3" style="font-size: 1.15rem; width: 30rem;">Kepuasan berbelanja anda adalah perhitungan kami untuk menjadikan toko kami berkembang dan berinovasi kedepannya agar kami bisa menjadi yang terbaik&nbsp;</p>
                <a class="btn btn-success btn-block mt-4" href="{{ url('/masuk') }}">Cari Makanan</a>
            </div>
            <div class="col-6">
                <img src="{{ asset('assets/img/shop.png') }}" class="img-fluid float-right" width="400" height="400">
            </div>
        </div>
</div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
