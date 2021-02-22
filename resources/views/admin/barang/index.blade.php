@extends('layouts.admin.master')
@section('title', 'Daftar Makanan')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1>Daftar Data Makanan</h1>
                    </div>
                    <div class="col-6">
                        <a href="{{url('/admin/barang/tambah')}}" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i> Tambah Data Makanan</a>
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
                                <table id="example1" class="table table-bordered table-striped table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th><center>Foto</center></th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Harga Jual</th>
                                            <th>Tanggal</th>
                                            <th><center>Status</center></th>
                                            <th><center>Option</center> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barangs as $key => $barang)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    <center>
                                                        <img src="{{ asset('uploads/'.$barang->image) }}" width="105px" height="105px">
                                                    </center>
                                                </td>
                                                <td>{{$barang->name}}</td>
                                                <td>{{$barang->stok}}</td>
                                                <td>@currency($barang->harga)</td>
                                                <td>{{$barang->created_at}}</td>
                                                <td>
                                                    <center>
                                                    @if($barang->stok <= 0)
                                                        <span class="badge badge-danger">Habis</span></a>
                                                    @elseif($barang->stok < 5)
                                                        <span class="badge badge-warning">Kritis</span></a>
                                                    @else
                                                        <span class="badge badge-success">Aman</span></a>
                                                    @endif
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                    <a href="{{url('/form-barang/'.$barang->id)}}" class="btn btn-xs btn-warning btn-flat"><i class="fa fa-edit"></i></a>
                                                    <a href="{{url('/delete-barang/'.$barang->id)}}" class="btn btn-xs btn-danger btn-flat" onclick="
                                                        return confirm('Anda Yakin Akan Menghapbarangs ?');"><i class="fa fa-trash"></i></a>
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

