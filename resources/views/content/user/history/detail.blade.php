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
                    <h2 class="animate__animated animate__fadeInDown"><span>Transaction</span> Details</h2>
                    @if ($transactions->status == 1)
                        <h3 class="text-success">Transaction Success</h3>
                        <h5 class="text-white">Your order has been checked out, then for payment, please transfer to a
                            <br><strong>BNI Bank Account Number : <strong
                                class="text-primary">32113-812145-456</strong> </strong><br>
                                with a nominal value : <strong
                                class="text-primary">@currency($transactions->total_price)</strong><br><br>
                                <b class="text-danger">{{$transactions->pay_limit}}</b>
                        </h5>
                    @elseif($transactions->status == 3)
                        <h3 class="text-success">Transaction Success !</h3>
                        <h5 class="text-white">Orders will be sent according to your destination address <strong
                                class="text-primary">{{ Auth::guard('user')->user()->address }}</strong>
                            <br>Estimated Up to<b class="text-primary"> 2-3 Days Working Hours</b><br>
                            Thank You <strong
                                class="text-primary">{{ Auth::guard('user')->user()->name }}</strong>
                        </h5>
                    @elseif($transactions->status == 4)
                        <h3 class="text-success">Transaction Finish !</h3>
                        <h5 class="text-white">Orders will be sent according to your destination address <strong
                                class="text-primary">{{ Auth::guard('user')->user()->address }}</strong>
                            <br>Estimated Up to<b class="text-primary"> 2-3 Days Working Hours</b><br>
                            Thank You <strong
                                class="text-primary">{{ Auth::guard('user')->user()->name }}</strong>
                        </h5>
                    @else
                        mbuh
                    @endif
                    <div>
                    <a href="{{route('user.history')}}" class="btn-menu animate__animated animate__fadeInUp scrollto mt-3">Back</a>
                    <a href="#transactionDetail" class="btn-menu animate__animated animate__fadeInUp scrollto mt-3">SEE MORE</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Hero -->

    <section id="transactionDetail">
        <div>
            <div class="text-center">
                <h1 class="mb-5">Your <span>Transaction Details</span></h1>
            </div>
            <div class="container">
                    <div class="row">
                        <div class="col-8 mb-5">
                            <div class="card shadow-sm" style="text-decoration: none; border-radius: 12px; border: none">
                                <div class="card-body mt-2 text-center">
                                    @if (!empty($transactionDetails))
                                        <table class='table table-hover'>
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
                        <div class="col-4 mb-5">
                            <div class="card shadow-sm">
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
                                            <button class="btn btn-success btn-block" type="button">Transfer
                                                @currency($transactions->total_price)</button>
                                        </div>
                                        </form>
                                    </div>
                                @elseif($transactions->status == 3)
                                    <div class="card-body">
                                        <p class="text-muted">Has your order arrived? if so, please click the finish button
                                        </p>
                                    </div>
                                    <form action="{{route('payments.finishTransaction', $transactions)}}" method="POST">
                                    @csrf
                                    <div class="card-footer bg-transparent">
                                        <div class="d-grid gap-2">
                                                <button class="btn btn-success btn-block">Finish</button>
                                            </div>
                                        </div>
                                    </form>
                                    @elseif($transactions->status == 4)
                                    <div class="card-body">
                                        <p class="text-muted">Transaction Finish, Thankyou for your order
                                        </p>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <div class="d-grid gap-2">
                                                <a href="{{route('user')}}" class="btn btn-success btn-block">Order Again ?</a>
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
