@extends('layouts.admin.master')
@section('title', 'Foods List')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Foods List</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Foods List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Foods Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/products/' . $food->image) }}" width="80px"
                                            height="80px">
                                    </td>
                                    <td>{{ $food->name }}</td>
                                    <td>{{ $food->stock }}</td>
                                    <td>@currency($food->price)</td>
                                    <td>{{ $food->description }}</td>
                                    <td>
                                        @if ($food->stock <= 0)
                                            <span class="badge bg-danger rounded-pill"> Out</span>
                                        @elseif ($food->stock < 5) <span class="badge bg-warning rounded-pill">
                                                Critical</span>
                                            @else
                                                <span class="badge bg-success rounded-pill"> Safe</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $food->id }}"><i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $food->id }}"><i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm swal-confirm"
                                            data-id="{{ $food->id }}">
                                            <form action="{{ route('foods.destroy', $food) }}" method="POST"
                                                id="delete{{ $food->id }}">
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
                </div>
            </div>
        </section>
    </div>

    {{-- Detail Modal --}}
    @foreach ($foods as $food)
        <div class="modal fade text-left modal-borderless" id="detailModal{{ $food->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title white">Detail {{ $food->name }}</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('content.admin.products.foods.detail')
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Edit Modal --}}
    @foreach ($foods as $food)
        <div class="modal fade text-left modal-borderless" id="editModal{{ $food->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title white">Edit {{ $food->name }}</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('foods.update', $food) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            @include('content.admin.products.foods.edit')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary px-5" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button class="btn btn-primary ml-1 px-5">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                    </form>
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

        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Delete Data',
                    text: 'Are you sure ?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Success! Food was deleted !", {
                            icon: "success",
                            button: false,

                        });
                        location.reload();
                        $('#delete' + id).remove();
                    }
                });
        });

    </script>
@endpush
