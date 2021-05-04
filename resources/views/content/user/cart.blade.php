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
                    <h2 class="animate__animated animate__fadeInDown"><span>Cart</span></h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <div>
                    <a href="#cart" class="btn-menu animate__animated animate__fadeInUp scrollto">See More</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Hero -->

    <section id="cart">
        <div>
            <div class="text-center">
                <h1 class="mb-5">Your <span style="color: #ffb03b">Cart</span></h1>
            </div>
            <div class="text-center">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body mt-2">
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
                                                <th scope='col'>Action</th>
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
                                                    <td>
                                                        <form action="{{ route('user.deleteCart', $transactionDetail) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="
                                                                                    return confirm('Anda Yakin Akan Menghapus Data ?');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5" align="right"><strong>Total Price :</strong></td>
                                                <td><strong>@currency($transactions->total_price)</strong></td>
                                                <td>
                                                    {{-- <a href="{{ url('konfirmasi-check-out')}}" class="btn btn-success btn-block"> Check Out</a> --}}
                                                    <button class="btn btn-warning" data-toggle="modal"
                                                        data-target="#methodModal">Check Out</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <h1>No one Products !</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="methodModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="methodModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="methodModalLabel">Payment Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-warning">Checkout Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
