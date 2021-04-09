@extends('admin.layouts.base')


@section('title')
    Home
@endsection

@section('styles')

    <script src="https://www.gstatic.com/charts/loader.js"></script>
@endsection

@section('content')

    <div class="section-header">
        <h1>Home Page</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{route('admins.index')}}">
                                <h4>Admins</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{$counts['admins']}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{route('users.index')}}">
                                <h4>Users</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{$counts['users']}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{route('products.index')}}">
                                <h4>Products</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{$counts['products']}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <a href="{{route('orders.index')}}">
                                <h4>Orders</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            {{$counts['orders']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <home></home>

    </div>

@endsection


@section('scripts')

@endsection
