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
                    <h2 class="animate__animated animate__fadeInDown"><span>Transaction</span> History</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                    <a href="#transaction" class="btn-menu animate__animated animate__fadeInUp scrollto">See More</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Hero -->

    <section id="transaction">
        <div>
            <div class="text-center">
                <h1>Your <span style="color: #ffb03b">Transaction</span></h1>
            </div>
            <div class="text-center">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body mt-2">
                                <table class='table table-hover'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>No</th>
                                            <th scope='col'>Date</th>
                                            <th scope='col'>Total Price</th>
                                            <th scope='col'>Method Payment</th>
                                            <th scope='col'>Status</th>
                                            <th scope='col'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>@currency($transaction->total_price)</td>
                                                <td>{{ $transaction->method_payment }}</td>
                                                <td>
                                                    @if ($transaction->status == 0)
                                                        <span class="badge badge-warning">At Cart</span>
                                                    @elseif ($transaction->status == 1)
                                                        <span class="badge badge-warning">Not Paid</span>
                                                    @elseif($transaction->status == 2)
                                                        <span class="badge badge-info">Waiting Confirm</span>
                                                    @elseif($transaction->status == 3)
                                                        <span class="badge badge-success">Being Delivered</span>
                                                    @elseif($transaction->status == 4)
                                                        <span class="badge badge-success">Finish</span>
                                                    @elseif($transaction->status == 5)
                                                        <span class="badge badge-danger">Reject</span>
                                                    @else
                                                        <span class="badge badge-danger">Gatau Kemana hehe keksi ilang
                                                            hehe</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.historyDetails',$transaction) }}"
                                                        class="btn btn-primary"><i class="fa fa-info mr-2"></i> Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="methodModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="methodModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="methodModalLabel">Payment Method</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.checkout') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method_payment" value="COD"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                COD (Cash On Delivey)
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="method_payment" value="Transfer"
                                id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Transfer Via Bank
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success">Checkout Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
