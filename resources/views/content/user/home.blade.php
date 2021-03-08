@extends('layouts.user.master')
@section('title', 'Addriansyah Shop')
@section('content')
    <section style="height:100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .btn:focus,
            .btn:active {
                outline: none !important;
            }

            .title-text-content-2-2 {
                padding-top: 5rem;
                margin-bottom: 3rem;
            }

            .text-title-content-2-2 {
                color: #121212;
                margin-bottom: 0.625rem;
                font-size: 2.25rem;
                line-height: 2.5rem;
                font-weight: 600;
            }

            .text-caption-content-2-2 {
                color: #121212;
                font-weight: 300;
            }

            .column-content-2-2 {
                padding-left: 2.25rem;
                padding-right: 2.25rem;
                padding-top: 2rem;
                padding-bottom: 2rem;
            }

            .icon-content-2-2 {
                margin-bottom: 1.5rem;
            }

            .icon-content-2-2-title {
                font-size: 1.5rem;
                line-height: 2rem;
                margin-bottom: 0.625rem;
                color: #121212;
            }

            .icon-content-2-2-caption {
                font-size: 1rem;
                line-height: 1.625;
                letter-spacing: 0.025em;
                color: #565656;
            }

            .card-block-content-2-2 {
                padding: 1rem 1rem 5rem 1rem;
            }

            .card-content-2-2 {
                padding: 1.75rem;
                background-color: #EEF6F4;
                border-radius: 0.75rem;
                border: 1px solid #27C499;
            }

            .card-content-2-2-title {
                font-size: 1.5rem;
                line-height: 2rem;
                margin-bottom: 0.625rem;
                color: #000000;
                font-weight: 600;
            }

            .card-content-2-2-caption {
                font-size: 1rem;
                line-height: 1.5rem;
                color: #565656;
                letter-spacing: 0.025em;
                font-weight: 300;
                margin-bottom: 0;
            }

            .btn-card-content-2-2 {
                font-size: 1rem;
                line-height: 1.5rem;
                font-weight: 700;
                color: #ffffff;
                background-color: #27C499;
                padding-top: 1rem;
                padding-bottom: 1rem;
                width: 100%;
                border-radius: 0.75rem;
                margin-bottom: 1.25rem;
            }

            .btn-card-content-2-2:hover {
                color: #ffffff;
                --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                    0 4px 6px -2px rgba(0, 0, 0, 0.05);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }

            .btn-outline-content-2-2 {
                font-size: 1rem;
                line-height: 1.5rem;
                color: #979797;
                border: 1px solid #979797;
                padding-top: 1rem;
                padding-bottom: 1rem;
                width: 100%;
                border-radius: 0.75rem;
            }

            .btn-outline-content-2-2:hover {
                border: 1px solid #27C499;
                color: #27C499;
            }

            .card-text-content-2-2 {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }

            .grid-padding-content-2-2 {
                padding: 0rem 1rem 3rem 1rem;
            }

            @media (min-width: 576px) {
                .grid-padding-content-2-2 {
                    padding: 0rem 2rem 3rem 2rem;
                }

                .card-block-content-2-2 {
                    padding: 3rem 2rem 5rem 2rem;
                }
            }

            @media (min-width: 768px) {
                .grid-padding-content-2-2 {
                    padding: 0rem 4rem 3rem 4rem;
                }

                .card-block-content-2-2 {
                    padding: 3rem 4rem 5rem 4rem;
                }
            }

            @media (min-width: 992px) {
                .grid-padding-content-2-2 {
                    padding: 1rem 6rem 3rem 6rem;
                }

                .card-block-content-2-2 {
                    padding: 3rem 6rem 5rem 6rem;
                }

                .column-content-2-2 {
                    padding-left: 2.25rem;
                    padding-right: 2.25rem;
                    padding-top: 0;
                    padding-bottom: 0;
                }
            }

            @media (min-width: 1200px) {
                .grid-padding-content-2-2 {
                    padding: 1rem 10rem 3rem 10rem;
                }

                .card-block-content-2-2 {
                    padding: 3rem 6rem 5rem 6rem;
                }

                .card-btn-space-content-2-2 {
                    margin-top: 15px;
                    margin-bottom: 15px;
                }

                .btn-card-content-2-2 {
                    width: 95%;
                    float: right;
                }

                .btn-outline-content-2-2 {
                    width: 95%;
                    float: right;
                }
            }

            @media (max-width: 980px) {
                .card-btn-space-content-2-2 {
                    width: 100%;
                }
            }

        </style>
        <div style="font-family: 'Poppins', sans-serif;">

            <div class="text-center title-text-content-2-2">
                <h1 class="text-title-content-2-2">3 Keys Benefit</h1>
                <p class="text-caption-content-2-2" style="  margin-left: 3rem; margin-right: 3rem;">You can easily
                    manage your business with a powerful tools</p>
            </div>

            <div class="grid-padding-content-2-2 text-center">
                <div class="row">
                    <div class="col-lg-4 column-content-2-2">
                        <div class="icon-content-2-2">
                            <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-5.png"
                                alt="">
                        </div>
                        <h3 class="icon-content-2-2-title">Fast Delivery</h3>
                        <p class="icon-content-2-2-caption">As soon as possible sent to your address</p>
                    </div>
                    <div class="col-lg-4 column-content-2-2">
                        <div class="icon-content-2-2">
                            <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-6.png"
                                alt="">
                        </div>
                        <h3 class="icon-content-2-2-title">Real-Time Analytic</h3>
                        <p class="icon-content-2-2-caption">With real-time analytics, you<br>
                            can check data in real time</p>
                    </div>
                    <div class="col-lg-4 column-content-2-2">
                        <div class="icon-content-2-2">
                            <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content2/Content-2-7.png"
                                alt="">
                        </div>
                        <h3 class="icon-content-2-2-title">Very Full Secured</h3>
                        <p class="icon-content-2-2-caption">With real-time analytics, we<br>
                            will guarantee your data</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="height: 100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF;">
        <div style="font-family: 'Poppins', sans-serif;">

            <div class="text-center title-text-content-2-2">
                <h1 class="text-title-content-2-2">Foods and Drinks</h1>
                <p class="text-caption-content-2-2" style="  margin-left: 3rem; margin-right: 3rem;">Choise your food or
                    drink you want</p>
            </div>
            <div class="grid-padding-content-2-2 text-center">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 column-content-2-2">
                            <a class="card" href="" style="text-decoration: none">
                                <div class="card-body">
                                    <div class="icon-content-2-2">
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            alt="{{ $product->name }}" class="img-fluid">
                                    </div>
                                    <h3 class="icon-content-2-2-title">{{ $product->name }}</h3>
                                    <p class="icon-content-2-2-caption fw-bold">@currency($product->price)</p>
                                    <p class="icon-content-2-2-caption">{{ $product->description }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
