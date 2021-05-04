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
                    <h2 class="animate__animated animate__fadeInDown">List of <span>Foods</span></h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                    <a href="#why-us" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Foods</a>
                    </div>
                </div>
                </div>
            </div>

            </div>

        </div>
        </div>
    </section>
    <!-- End Hero -->

    <section id="why-us" class="why-us mt-5">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Foods <span>Menu</span></h2>
                <p>Choise your foods you want</p>
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
    </section>
    <!-- End Whu Us Section -->
@endsection
