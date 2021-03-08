@extends('layouts.admin.master')
@section('title', 'Add Products')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add Products</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-content">
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
        </section>
    </div>
@endsection
