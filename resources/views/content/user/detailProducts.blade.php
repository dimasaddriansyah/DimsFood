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

        <div style="font-family: 'Poppins', sans-serif;">
            <div class="grid-padding-content-2-2">
                <div class="col-12 column-content-2-2 mb-5">
                    <div class="card shadow-sm" style="border: none">
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
                                            <button type="submit" class="btn btn-success btn-block mt-3"><i
                                                    class="fa fa-shopping-cart me-2"></i> Add to cart</button>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-success btn-block mt-3"> Login
                                                First <i class="fas fa-arrow-right ms-2"></i></a>
                                        @endif
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
