@extends('layouts.admin.master')
@section('title', 'Transaction History')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Transaction History</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaction History</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover" id="table1">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Users Name</th>
                                <th>Transaction Date</th>
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
                                    <td>
                                        @if ($transaction->status == 1)
                                            <span class="badge bg-warning">Belum Bayar</span>
                                        @elseif($transaction->status == 2)
                                            <span class="badge bg-info">Menunggu Konfirmasi</span>
                                        @elseif($transaction->status == 3)
                                            <span class="badge bg-success">Sedang Diantar</span>
                                        @elseif($transaction->status == 4)
                                            <span class="badge bg-success">Sampai Ditujuan</span>
                                        @elseif($transaction->status == 5)
                                            <span class="badge bg-danger">Ditolak</span>
                                        @else
                                            <span class="badge bg-danger">Gatau Kemana hehe keksi ilang hehe</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $transaction->id }}"><i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    {{-- Detail Modal --}}
    @foreach ($transactions as $transaction)
        <div class="modal fade text-left modal-borderless" id="detailModal{{ $transaction->id }}" tabindex="-1"
            role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title white">Detail</h5>
                        <h5 class="modal-title white">{{ $transaction->created_at }}</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <img src="{{ url('bukti_pembayaran') }}/{{ $transaction->bukti_pembayaran }}"
                                    class="img-fluid mx-auto d-block zoom">
                            </div>
                            <div class="col-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td><strong>User Name</strong> </td>
                                            <td width="15px">:</td>
                                            <td>{{ $transaction->users->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Number Phone</strong> </td>
                                            <td width="15px">:</td>
                                            <td>{{ $transaction->users->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat</strong> </td>
                                            <td width="15px">:</td>
                                            <td>{{ $transaction->users->address }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Harga</strong> </td>
                                            <td width="15px">:</td>
                                            <td>@currency($transaction->total_price)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status</strong> </td>
                                            <td width="15px">:</td>
                                            <td>
                                                @if ($transaction->status == 1)
                                                    <span class="badge bg-warning">Belum Bayar</span>
                                                @elseif($transaction->status == 2)
                                                    <span class="badge bg-info">Menunggu Konfirmasi</span>
                                                @elseif($transaction->status == 3)
                                                    <span class="badge bg-success">Sedang Diantar</span>
                                                @elseif($transaction->status == 4)
                                                    <span class="badge bg-success">Sampai Ditujuan</span>
                                                @elseif($transaction->status == 5)
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @else
                                                    <span class="badge bg-danger">Gatau Kemana hehe keksi ilang
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

@push('css')
    <link rel="stylesheet" href="{{ asset('assets_admin/vendors/simple-datatables/style.css') }}">
@endpush

@push('script')
    <script src="{{ asset('assets_admin/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

    </script>
@endpush
