@extends('layouts.admin.master')
@section('title', 'Food List')
@section('content')
    <div class="section-header">
        <h1>food List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Food List</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary float-right px-4 mb-3" data-toggle="modal" data-target="#addfood" href=""><i class="fas fa-user-plus mr-2"></i> Add Foods</button>
                    </div>
                </div>
                <table id="example1" class="table table-bordered table-hover table-responsive-lg">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Option </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{ asset('uploads/'.$food->image) }}" width="50px" height="50px">
                                </td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->stok}}</td>
                                <td>@currency($food->harga)</td>
                                <td>{{$food->created_at}}</td>
                                <td>

                                    @if($food->stok <= 0)
                                        <span class="badge badge-danger">Habis</span></a>
                                    @elseif($food->stok < 5)
                                        <span class="badge badge-warning">Kritis</span></a>
                                    @else
                                        <span class="badge badge-success">Aman</span></a>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#editfood{{ $food->id }}"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-xs btn-danger btn-flat swal-confirm" data-id="{{ $food->id }}">
                                            <form action="{{ route('foods.destroy', $food) }}" method="POST" id="delete{{ $food->id }}">
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
    {{-- Add --}}
    <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" id="addfood">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add food</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('foods.store') }}" method="post">
                        @csrf
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Makanan</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                            value="{{ old('name') }}" style=text-transform: capitalize;>
                                        @if ($errors->has('name')) <span
                                                class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span> @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
                                            value="{{ old('stok') }}">
                                        @if ($errors->has('stok')) <span
                                                class="invalid-feedback"><strong>{{ $errors->first('stok') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Harga Makanan</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                            value="{{ old('harga') }}"
                                            onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);">Nominal
                                        : <span id="format"></span>
                                        @if ($errors->has('harga')) <span
                                                class="invalid-feedback"><strong>{{ $errors->first('harga') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Stok Makanan</label>
                                        <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
                                            value="{{ old('stok') }}">
                                        @if ($errors->has('stok')) <span
                                                class="invalid-feedback"><strong>{{ $errors->first('stok') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Makanan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                    value="{{ old('keterangan') }}" style="text-transform: capitalize;">
                                @if ($errors->has('keterangan'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('keterangan') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @if ($errors->has('image')) <span
                                        class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span> @endif
                            </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button class="btn btn-secondary px-lg-5" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary px-lg-5">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Add --}}

    <!-- Modal edit -->
    @foreach ($foods as $food)
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="editfood{{ $food->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editfood" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editfood">Edit food</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('foods.update',$food) }}" method="post">
                        @method('PATCH')
                        @csrf
                        @include('content.admin.foods.edit')
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary px-lg-5" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary px-lg-5">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    {{-- End Edit --}}

@endsection
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('tampilan-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@push('script')
<script src="{{ asset('assets_admin/dist/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets_admin/js/page/modules-sweetalert.js') }}"></script>
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
    $('#addfood').on('shown.bs.modal', function() {
        $('#name').focus();
    })

    @if($errors->any())
        $('#addfood').modal('show')
    @endif

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
            if(willDelete){
                $('#delete' + id).submit();
            }
        });
    });
</script>
@include('sweet::alert')
@endpush


