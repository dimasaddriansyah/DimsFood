@extends('layouts.admin.master')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            @if (!empty($critical))
                <a class="btn btn-warning mr-2" href="{{ route('products.critical') }}">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Stock Product Critical <b>{{ $critical }}</b>
                </a>
            @endif
            @if (!empty($sold))
                <a class="btn btn-danger" href="{{ route('products.sold') }}"><i class="fas fa-ban mr-2"></i> Stocl Product
                    Sold
                    <b>{{ $sold }}</b></a>
            @endif
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('users') }}" class="card card-statistic-1" style="text-decoration: none">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            <div class="count">{{ $users }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('foods.index') }}" class="card card-statistic-1" style="text-decoration: none">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Foods</h4>
                        </div>
                        <div class="card-body">
                            <div class="count">{{ $foods }}</div>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('drinks.index') }}" class="card card-statistic-1" style="text-decoration: none">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-clipboard"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Drinks</h4>
                        </div>
                        <div class="card-body">
                            <div class="count">{{ $drinks }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="#" class="card card-statistic-1" style="text-decoration: none">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Products</h4>
                        </div>
                        <div class="card-body">
                            <div class="count">{{ $products }}</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="" class="card card-statistic-1 btn-info" style="text-decoration: none">
                    <div class="card-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4 class="text-white">Income</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-white count">{{ $income }}</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets_admin/js/count.js') }}"></script>
@endpush


