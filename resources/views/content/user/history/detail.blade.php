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

            <div class="text-center title-text-content-2-2">
                <h1 class="text-title-content-2-2">Your Transaction Details</h1>
            </div>
            <div class="grid-padding-content-2-2">
                <div class="row">
                    <div class="col-12 column-content-2-2 mb-5 text-center">
                        <div class="card shadow-sm" style="text-decoration: none; border-radius: 12px; border: none">
                            <div class="card-body mt-2">
                                @if ($transactions->status == 1)
                                <h3 class="text-success">Transaction Success</h3>
                                <h5>Your order has been checked out, then for payment, please transfer to a
                                    <br><strong>BNI Bank Account Number : <strong
                                        class="text-primary">32113-812145-456</strong> </strong><br>
                                        with a nominal value : <strong
                                        class="text-primary">@currency($transactions->total_price)</strong><br><br>
                                        <b id="countdown" class="text-danger"></b>
                                    </h5>
                                @elseif($transactions->status == 3)
                                    <h3 class="text-success">Transaction Success !</h3>
                                    <h5>Orders will be sent according to your destination address <strong
                                            class="text-primary">{{ Auth::guard('user')->user()->address }}</strong>
                                        <br>Estimated Up to<b class="text-primary"> 2-3 Days Working Hours</b><br>
                                        Thank You <strong
                                            class="text-primary">{{ Auth::guard('user')->user()->name }}</strong>
                                    </h5>
                                @else
                                    mbuh
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 column-content-2-2 mb-5">
                            <div class="card shadow-sm" style="text-decoration: none; border-radius: 12px; border: none">
                                <div class="card-body mt-2 text-center">
                                    @if (!empty($transactionDetails))
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Image</th>
                                                    <th scope='col'>Products Name</th>
                                                    <th scope='col'>Qty</th>
                                                    <th scope='col'>Price</th>
                                                    <th scope='col'>Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transactionDetails as $transactionDetail)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ asset('uploads/products/' . $transactionDetail->products->image) }}"
                                                                width="80px" height="80px">
                                                        </td>
                                                        <td>{{ $transactionDetail->products->name }}</td>
                                                        <td>{{ $transactionDetail->qty }}</td>
                                                        <td>@currency($transactionDetail->products->price)</td>
                                                        <td>@currency($transactionDetail->total_price)</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="5" align="right"><strong>Total Price :</strong></td>
                                                    <td><strong>@currency($transactions->total_price)</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-4 column-content-2-2 mb-5">
                            <div class="card shadow-sm" style="text-decoration: none; border-radius: 12px; border: none">
                                <div class="card-header bg-success text-center text-white">
                                    <h6>Confirm Transaction</h6>
                                </div>
                                @if ($transactions->status == 1)
                                    <div class="card-body">
                                        <form action="">
                                            <div class="form-group">
                                                <label class="form-label">Full Name</label>
                                                <input class="form-control"
                                                    value="{{ Auth::guard('user')->user()->name }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label mt-2">Phone Number</label>
                                                <input class="form-control"
                                                    value="{{ Auth::guard('user')->user()->phone_number }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label mt-2">Full Address</label>
                                                <input class="form-control"
                                                    value="{{ Auth::guard('user')->user()->address }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label mt-2">Upload Proof Payment</label>
                                                <input type="file" name="proof_payment" class="form-control">
                                            </div>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success" type="button"
                                                style="border-radius: 12px;">Transfer
                                                @currency($transactions->total_price)</button>
                                        </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="card-body">
                                        <p class="text-muted">Has your order arrived? if so, please click the finish button
                                        </p>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success" type="button"
                                                style="border-radius: 12px;">Finish</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        CountDownTimer('{{ $transactions->created_at }}', 'countdown');

        function CountDownTimer(dt, id) {
            var end = new Date('{{ $transactions->pay_limit }}');
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;

            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                if (distance < 0) {

                    clearInterval(timer);
                    document.getElementById(id).innerHTML = '<b>You have not paid for this transaction</b> ';
                    return;
                }
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                document.getElementById(id).innerHTML += '*You must transfer : ';
                document.getElementById(id).innerHTML += hours + 'hrs ';
                document.getElementById(id).innerHTML += minutes + 'mins ';
                document.getElementById(id).innerHTML += seconds + 'secs';
            }
            timer = setInterval(showRemaining, 1000);
        }
    </script>
@endpush
