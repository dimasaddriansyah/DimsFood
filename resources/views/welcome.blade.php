<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Addriansyah Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="container-fluid">
                <a class="navbar-brand" style="font-size: 30px;">Addriansyah Shop</a>
                <div>
                    <a href="{{ url('/masuk') }}" style=" margin-left: 0px;
                    margin-right: 20px;  ">LOGIN</a>
    <a class="btn btn-primary" href="{{ url('/register') }}" style="border-radius: 50px;">SIGN UP</a>
                </div>
            </div>
        </nav>
    </div>
    <img src="{{ asset('assets/img/shop.png') }}" style="width: 49%;height: 19%;
    margin-left: 683px;
    margin-top: 10px; ">
    <div class="col">
        <h1 style=" margin-bottom: 0;
        margin-right: 0;
        margin-left: 20px;
        margin-top: -410px;
        width: 500px;
        font-size: 40px;
        font-family: Roboto, sans-serif;">Kami Ada Untuk Anda<br>Kapanpun dan Dimanapun.</h1>
        <p style="  font-size: 20px;
        width: 520px;
        margin-left: 20px;
        margin-top: 20px;" class="text-left">Kepuasan berbelanja anda adalah perhitungan kami untuk menjadikan toko kami berkembang dan berinovasi kedepannya agar kami bisa menjadi yang terbaik&nbsp;</p>
        <a style=" box-shadow:10px 10px 20px grey ;
        border-radius: 50px; 
        margin-left: 20px;
        width: 150px;
        height: 50px;
        font-size: 16px;
        font-style: normal;
        font-family: Roboto, sans-serif;" class="btn-round text-left d-xl-flex justify-content-xl-center align-items-xl-center btn btn-primary mt-4" href="{{ url('/masuk') }}">JOIN WITH US</a>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>