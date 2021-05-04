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
                    <h2 class="animate__animated animate__fadeInDown">Detail Product <span>{{ $products->name }}</span></h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                    <a href="{{route('user')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">Back</a>
                    <a href="#product" class="btn-menu animate__animated animate__fadeInUp scrollto">See More</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Hero -->

    <section id="product">
        <div class="container mt-5">
            <div class="col-12 mb-5">
                <div class="card shadow-sm" style="border: none; margin-top: 80px;">
                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <img src="{{ asset('uploads/products/' . $products->image) }}"
                                    alt="{{ $products->name }}" class="img-fluid">
                            </div>
                            <div class="col-6 align-self-center">
                                <h3 class="icon-content-2-2-title text-center mb-4">{{ $products->name }}</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td><strong>Price</strong></td>
                                            <td width="15px">:</td>
                                            <td>@currency($products->price)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Stock</strong> </td>
                                            <td width="15px">:</td>
                                            <td>{{ $products->stock }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Description</strong> </td>
                                            <td width="15px">:</td>
                                            <td>{{ $products->description }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Qty</strong> </td>
                                            <td width="15px">:</td>
                                            <td>
                                                <form action="{{ route('user.addCart',$products) }}" method="post">
                                                    @csrf
                                                    <input type="number" name="qty"
                                                        class="form-control @error('qty') is-invalid @enderror"
                                                        autofocus>
                                                    @if ($errors->has('qty'))
                                                        <span
                                                            class="invalid-feedback"><strong>{{ $errors->first('qty') }}</strong></span>
                                                    @endif
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="d-grid gap-2">
                                    @if (Auth::guard('user')->user())
                                        @if ($products->stock == 0)
                                        <button class="btn btn-danger btn-block mt-3" disabled><i
                                            class="fa fa-ban mr-2"></i> Out Stock</button>
                                        @else
                                        <button type="submit" class="btn btn-warning btn-block mt-3"><i
                                                class="fa fa-shopping-cart mr-2"></i> Add to cart</button>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-warning btn-block mt-3"> Login
                                            First <i class="fas fa-arrow-right ml-2"></i></a>
                                    @endif
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

