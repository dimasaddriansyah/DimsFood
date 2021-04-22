@extends('layouts.admin.master')
@section('title', 'Drinks List')
@section('content')
<div class="section-header">
    <h1>Drinks List</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('products') }}">Products List</a></div>
        <div class="breadcrumb-item">Drinks List</div>
    </div>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('products') }}" class="btn btn-primary align-content-center float-left mb-3"><i class="fas fa-chevron-left mr-2"></i>
                        Back to products
                    </a>
                </div>
                <div class="col-6">
                    @if (!empty($critical))
                            <a class="btn btn-warning text-white float-right ml-2 mb-3" href="{{ route('products.critical') }}"><i class="fas fa-exclamation-triangle mr-2">
                                </i> Stock Critical <b>{{ $critical }}</b>
                            </a>
                        @endif
                        @if (!empty($sold))
                            <a class="btn btn-danger text-white float-right mb-3" href="{{ route('products.sold') }}"><i class="fas fa-ban mr-2">
                                </i> Stock Sold <b>{{ $sold }}</b>
                            </a>
                        @endif
                </div>
            </div>
            <table id="example1" class="table table-bordered table-hover table-responsive-lg">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Drinks Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drinks as $drink)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('uploads/products/' . $drink->image) }}" width="80px"
                                    height="80px">
                            </td>
                            <td>{{ $drink->name }}</td>
                            <td>{{ $drink->stock }}</td>
                            <td>@currency($drink->price)</td>
                            <td>{{ $drink->description }}</td>
                            <td>
                                @if ($drink->stock <= 0)
                                    <span class="badge badge-danger rounded-pill"> Sold</span>
                                @elseif ($drink->stock < 5)
                                    <span class="badge badge-warning rounded-pill"> Critical</span>
                                @else
                                    <span class="badge badge-success rounded-pill"> Safe</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#detailModal{{ $drink->id }}"><i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editModal{{ $drink->id }}"><i class="fas fa-edit"></i>
                                </button>
                                <button type="submit" class="btn btn-danger btn-sm swal-confirm"
                                    data-id="{{ $drink->id }}">
                                    <form action="{{ route('drinks.destroy', $drink) }}" method="POST"
                                        id="delete{{ $drink->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>

@section('modal')
    {{-- Detail Modal --}}
    @foreach ($drinks as $drink)
    <div class="modal fade text-left modal-borderless" id="detailModal{{ $drink->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white pb-3">Detail {{ $drink->name }}</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @include('content.admin.products.drinks.detail')
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Edit Modal --}}
    @foreach ($drinks as $drink)
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="editModal{{ $drink->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white pb-3" id="editModal">Edit drink Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('drinks.update', $drink) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        @include('content.admin.products.drinks.edit')
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection
@endsection

@push('css')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets_admin/dist/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <script>
        function formatCurrency(num) {
            num = num.toString().replace(/\$|\,/g,'');
            if(isNaN(num))
            num = "0";
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num*100+0.50000000001);
            cents = num%100;
            num = Math.floor(num/100).toString();
            if(cents<10)
            cents = "0" + cents;
            for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
            num = num.substring(0,num.length-(4*i+3))+'.'+
            num.substring(num.length-(4*i+3));
            return (((sign)?'':'-') + 'Rp ' + num);
        }
    </script>
@endpush

@push('script')
<script src="{{ asset('assets_admin/dist/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/page/modules-sweetalert.js') }}"></script>
<script src="{{asset('assets_admin/dist/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('assets_admin/dist/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    @if($errors->any())
            $('#editModal').modal('show')
    @endif

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

    $(".swal-confirm").on('click', (function(e) {
            e.preventDefault();
            id = e.target.dataset.id;
            return swal({
                    title: 'Delete Data',
                    text: 'Are you sure ?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#delete' + id).submit();
                    }
                });
        }));
    </script>
    @include('sweet::alert')
@endpush
