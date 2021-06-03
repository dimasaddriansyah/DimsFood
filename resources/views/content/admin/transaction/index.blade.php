@extends('layouts.admin.master')
@section('title', 'Transaction History')
@section('content')
<div class="section-header">
    <h1>Transaction History</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Transaction History</div>
    </div>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-responsive-lg">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Users Name</th>
                        <th>Transaction Date</th>
                        <th>Method Payment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->users->name }}</td>
                            <td>{{ $transaction->created_at }}</td>
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
                                    <span class="badge badge-danger">Gatau Kemana hehe keksi ilang hehe</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#detailModal{{ $transaction->id }}"><i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('modal')
    {{-- Detail Modal --}}
    @foreach ($transactions as $transaction)
    <div class="modal fade text-left modal-borderless" id="detailModal{{ $transaction->id }}" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary py-3">
                    <h5 class="modal-title text-white">Detail Transaction</h5>
                    <h6 class="modal-title text-white">{{ $transaction->created_at }}</h6>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 align-self-center">
                            @if ($transaction->method_payment == "COD")
                                <img src="{{ asset('uploads/payment/COD.png') }}"
                                        class="img-fluid mx-auto d-block zoom">
                            @else
                                <img src="{{ asset('/uploads/payment/' . $transaction->proof_payment) }}" class="img-fluid mx-auto d-block zoom">
                            @endif
                        </div>
                        <div class="col-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td><strong>User Name</strong> </td>
                                        <td>:</td>
                                        <td>{{ $transaction->users->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Phone</strong> </td>
                                        <td>:</td>
                                        <td>{{ $transaction->users->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address</strong> </td>
                                        <td>:</td>
                                        <td>{{ $transaction->users->address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Price</strong> </td>
                                        <td>:</td>
                                        <td>@currency($transaction->total_price)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Method</strong> </td>
                                        <td>:</td>
                                        <td>{{$transaction->method_payment}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status</strong> </td>
                                        <td>:</td>
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
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('assets_admin/dist/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@push('script')
<script src="{{ asset('assets_admin/dist/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/page/modules-sweetalert.js') }}"></script>
<script src="{{asset('assets_admin/dist/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('assets_admin/dist/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
$(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        });
    });
    </script>
@endpush
