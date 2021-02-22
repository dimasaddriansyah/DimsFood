@extends('layouts.admin.master')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1>Daftar Akun Pengguna</h1>
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
                                            <th>Nama Pengguna</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($penggunas as $key => $pengguna)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$pengguna->name}}</td>
                                                <td>{{$pengguna->email}}</td>
                                                <td>{{$pengguna->alamat}}</td>
                                                <td>{{$pengguna->no_hp}}</td>
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

