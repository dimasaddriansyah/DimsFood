@extends('layouts.admin.master')
@section('title', 'Add Products')
@section('content')
<div class="section-header">
    <h1>Add Products</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Add Products</div>
    </div>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('productsStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name" class="form-label @error('name') text-danger @enderror">Products
                                Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" value="{{ old('name') }}"
                                style="text-transform: capitalize;" autofocus>
                            @if ($errors->has('name')) <span
                                    class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="category"
                                class="form-label @error('category') text-danger @enderror">Category</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                <option value="Food">Food</option>
                                <option value="Drink">Drink</option>
                            </select>
                            @if ($errors->has('stok')) <span
                                    class="invalid-feedback"><strong>{{ $errors->first('stok') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="price"
                                class="form-label @error('price') text-danger @enderror">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                name="price" value="{{ old('price') }}"
                                onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);">Nominal
                            : <span id="format"></span>
                            @if ($errors->has('price')) <span
                                    class="invalid-feedback"><strong>{{ $errors->first('price') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="stock"
                                class="form-label @error('stock') text-danger @enderror">Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                name="stock" value="{{ old('stock') }}">
                            @if ($errors->has('stock')) <span
                                    class="invalid-feedback"><strong>{{ $errors->first('stock') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description"
                        class="form-label @error('description') text-danger @enderror">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') }}"
                        style="text-transform: capitalize;">
                    @if ($errors->has('description'))
                        <span
                            class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image" class="form-label @error('image') text-danger @enderror">Upload
                        Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @if ($errors->has('image')) <span
                            class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                    @endif
                </div>
                <button class="btn btn-primary btn-block mt-4">Save Products</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('css')
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
