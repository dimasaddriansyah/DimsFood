@extends('layouts.admin.master')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>Daftar Data Menunggu Konfirmasi</h1>
                    </div>
                    <div class="col-6">
                        {{-- <a href="#" class="btn btn-success float-right"><i class="fa fa-coins mr-2"></i> Pendapatan : @currency($untung)</a> --}}
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pembeli</th>
                                            <th>Tanggal Transaksi</th>
                                            <th><center>Status</center></th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pesanans as $key => $pesanan)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$pesanan->pengguna->name}}</td>
                                                <td>{{$pesanan->created_at}}</td>
                                                <td>
                                                    <center>
                                                    @if($pesanan->status == 1)
                                                        <span class="badge badge-warning"> Sudah Pesan & Belum Bayar</span>
                                                    @elseif($pesanan->status == 2)
                                                        <span class="badge badge-info"> Menunggu Konfirmasi</span>
                                                    @elseif($pesanan->status == 3)
                                                        <span class="badge badge-success"> Pesanan Berhasil & Sedang Diantar</span>
                                                    @elseif($pesanan->status == 4)
                                                        <span class="badge badge-success"> Pesanan Sampai Ditujuan</span>
                                                    @elseif($pesanan->status == 5)
                                                        <span class="badge badge-danger"> Pesanan Ditolak</span>
                                                    @else
                                                        <span class="badge badge-danger"> Gatau Kemana hehe keksi ilang hehe</span>
                                                    @endif
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                    <a href="{{ url('/admin/transaksi-detail')}}/{{ $pesanan->id}}" class="btn btn-primary"><i class="fa fa-info mr-2"></i> Detail</a>
                                                    </center>
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
        </div>
        <!-- /.content -->
    </div>
@endsection

@push('after-styles')
    <link rel="stylesheet" href="{{asset('tampilan-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@push('after-script')
    <script src="{{asset('tampilan-admin/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{asset('tampilan-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
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

