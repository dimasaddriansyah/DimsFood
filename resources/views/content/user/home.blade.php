@extends('layouts.user.master')
@section('title', 'Addriansyah Shop')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background: url('assets_home/img/slide/slide-1.jpg');">
                <div class="carousel-container">
                <div class="carousel-content">
                    <h2 class="animate__animated animate__fadeInDown"><span>Dims</span> Food</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                    <a href="#why-us" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                    </div>
                </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background: url('assets_home/img/slide/slide-2.jpg');">
                <div class="carousel-container">
                <div class="carousel-content">
                    <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                    <a href="#why-us" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                    </div>
                </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background: url(assets_home/img/slide/slide-3.jpg);">
                <div class="carousel-background"><img src="{{ asset('assets_home/img/slide/slide-3.jpg') }}" alt=""></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                    <a href="#why-us" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                    </div>
                </div>
                </div>
            </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>

        </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- ====== Main Section ===== -->
    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">

                <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets_home/img/about.jpg");'>
                    <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                </div>

                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

                    <div class="content">
                    <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                    </p>
                    <ul>
                        <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                    </ul>
                    </div>

                </div>

                </div>

            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Whu Us Section ======= -->
        <section id="why-us" class="why-us">
        <div class="container">
            <div class="section-title">
                <h2>Why choose <span>Our Restaurant</span></h2>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 mt-5">
                        @if ($product->stock >= 1)
                            <div class="box">
                                <a href="{{ route('user.detailProducts', $product) }}">
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            alt="{{ $product->name }}" class="img-fluid"
                                            style="height:250px; object-fit: cover; object-position: center">
                                        <h3 class="pt-3">{{ $product->name }}</h3>
                                        <p>@currency($product->price)</p>
                                </a>
                            </div>
                        @else
                            <div class="box">
                                <img src="{{ asset('uploads/products/' . $product->image) }}"
                                    alt="{{ $product->name }}" class="img-fluid"
                                    style="object-fit: cover; object-position: center">
                                <h3 class="pt-3" style="color: #ffb03b">{{ $product->name }}</h3>
                                <p>@currency($product->price)</p>
                                <h3 class="text-center pt-4">Sold</h3>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        </section><!-- End Whu Us Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
        <div class="container-fluid">

            <div class="section-title">
            <h2>Some photos from <span>Our Restaurant</span></h2>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>

            <div class="row no-gutters">

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="{{ asset('assets_home/img/gallery/gallery-1.jpg') }}" class="venobox" data-gall="gallery-item">
                    <img src="{{ asset('assets_home/img/gallery/gallery-1.jpg') }}" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="{{ asset('assets_home/img/gallery/gallery-2.jpg') }}" class="venobox" data-gall="gallery-item">
                    <img src="{{ asset('assets_home/img/gallery/gallery-2.jpg') }}" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="{{ asset('assets_home/img/gallery/gallery-3.jpg') }}" class="venobox" data-gall="gallery-item">
                    <img src="{{ asset('assets_home/img/gallery/gallery-3.jpg') }}" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="{{ asset('assets_home/img/gallery/gallery-4.jpg') }}" class="venobox" data-gall="gallery-item">
                    <img src="{{ asset('assets_home/img/gallery/gallery-4.jpg') }}" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="{{ asset('assets_home/img/gallery/gallery-5.jpg') }}" class="venobox" data-gall="gallery-item">
                    <img src="{{ asset('assets_home/img/gallery/gallery-5.jpg') }}" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="{{ asset('assets_home/img/gallery/gallery-6.jpg') }}" class="venobox" data-gall="gallery-item">
                    <img src="{{ asset('assets_home/img/gallery/gallery-6.jpg') }}" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="{{ asset('assets_home/img/gallery/gallery-7.jpg') }}" class="venobox" data-gall="gallery-item">
                    <img src="{{ asset('assets_home/img/gallery/gallery-7.jpg') }}" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="{{ asset('assets_home/img/gallery/gallery-8.jpg') }}" class="venobox" data-gall="gallery-item">
                    <img src="{{ asset('assets_home/img/gallery/gallery-8.jpg') }}" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            </div>

        </div>
        </section><!-- End Gallery Section -->

    </main>
    <!-- End #main -->
@endsection

@push('css')
    <style>
        .card {
            -webkit-transition: 0.7s ease-in;
        }

        .card:hover {
            background-color: #27C499
        }

    </style>
@endpush
