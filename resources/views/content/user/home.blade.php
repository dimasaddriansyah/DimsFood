@extends('layouts.user.master')
@section('title', 'Addriansyah Shop')
@section('content')

    <section style="height: 100%; width: 100%; box-sizing: border-box; background-color: #FFFFFF;">
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
        {{-- Hero --}}
        <div>
            <div class="mx-auto d-flex flex-lg-row flex-column hero-header-2-2">
                <!-- Left Column -->
                <div
                    class="left-column-header-2-2 d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
                    <p class="text-caption-header-2-2">DIMSFOOD</p>
                    <h1 class="title-text-big-header-2-2 d-lg-inline d-none">We provide <br> the best food and drink for you
                    </h1>
                    <h1 class="title-text-small-header-2-2 d-lg-none d-inline">The best way for those of you who are in need
                        of food and drink</h1>
                    {{-- <div
                        class="div-button-header-2-2 d-inline d-lg-flex align-items-center mx-lg-0 mx-auto justify-content-center">
                        <button class="btn d-inline-flex mb-md-0 btn-try-header-2-2">Try it free</button>
                        <button class="btn btn-outline-header-2-2">
                            <div class="d-flex align-items-center">
                                <svg class="me-2" width="13" height="12" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.9293 7.99988L6.66668 5.15788V10.8419L10.9293 7.99988ZM12.9173 8.27722L5.85134 12.9879C5.80115 13.0213 5.74283 13.0404 5.6826 13.0433C5.62238 13.0462 5.5625 13.0327 5.50934 13.0042C5.45619 12.9758 5.41175 12.9334 5.38075 12.8817C5.34976 12.83 5.33337 12.7708 5.33334 12.7105V3.28922C5.33337 3.22892 5.34976 3.16976 5.38075 3.11804C5.41175 3.06633 5.45619 3.02398 5.50934 2.99552C5.5625 2.96706 5.62238 2.95355 5.6826 2.95644C5.74283 2.95932 5.80115 2.97848 5.85134 3.01188L12.9173 7.72255C12.963 7.75299 13.0004 7.79423 13.0263 7.84261C13.0522 7.89099 13.0658 7.94501 13.0658 7.99988C13.0658 8.05475 13.0522 8.10878 13.0263 8.15716C13.0004 8.20553 12.963 8.24678 12.9173 8.27722Z"
                                        fill="#555B61" />
                                </svg>
                                Watch the video
                            </div>
                        </button>
                    </div> --}}
                </div>
                <!-- Right Column -->
                <div class="right-column-header-2-2 text-center d-flex justify-content-center pe-0">
                    <img id="img-fluid" style="display: block;max-width: 100%;height: auto;"
                        src="{{ asset('assets_admin/img/HERO.png') }}" alt="">
                </div>
            </div>
        </div>

        <div style="font-family: 'Poppins', sans-serif;">

            <div class="text-center title-text-content-2-2">
                <h1 class="text-title-content-2-2">Foods and Drinks</h1>
                <p class="text-caption-content-2-2" style="  margin-left: 3rem; margin-right: 3rem;">Choise your food or
                    drink you want</p>
            </div>
            <div class="grid-padding-content-2-2 text-center">
                <div class="row">
                    @foreach ($products as $product)
                        @if ($product->stock >= 1)
                            <div class="col-lg-4 column-content-2-2 mb-5">
                                <a class="card shadow-sm" href="{{ route('user.detailProducts', $product) }}"
                                    style="text-decoration: none; height: 450px; border-radius: 12px; border: none">
                                    <div class="card-body mt-2">
                                        <div class="icon-content-2-2">
                                            <img src="{{ asset('uploads/products/' . $product->image) }}"
                                                alt="{{ $product->name }}" class="img-fluid"
                                                style="height: 200px; object-fit: cover; object-position: center">
                                        </div>
                                        <h3 class="icon-content-2-2-title">{{ $product->name }}</h3>
                                        <p class="icon-content-2-2-caption fw-bold">@currency($product->price)</p>
                                        <p class="icon-content-2-2-caption">{{ $product->description }}</p>
                                    </div>
                                </a>
                            </div>
                        @else
                            <div class="col-lg-4 column-content-2-2 mb-5">
                                <button class="card bg-danger shadow-sm"
                                    style="text-decoration: none; height: 450px; border-radius: 12px; border: none"
                                    disabled>
                                    <div class="card-body mt-2">
                                        <div class="icon-content-2-2">
                                            <img src="{{ asset('uploads/products/' . $product->image) }}"
                                                alt="{{ $product->name }}" class="img-fluid"
                                                style="height: 200px; object-fit: cover; object-position: center">
                                        </div>
                                        <h3 class="icon-content-2-2-title text-white">{{ $product->name }}</h3>
                                        <p class="icon-content-2-2-caption fw-bold text-white">@currency($product->price)
                                        </p>
                                        <p class="icon-content-2-2-caption text-white">{{ $product->description }}</p>
                                    </div>
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
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
