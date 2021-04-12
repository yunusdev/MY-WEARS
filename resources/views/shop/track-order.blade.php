@extends('layouts.base')
@section('title')
    Track Order
@endsection
@section('content')

    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="column">
                <h1>Track Order</h1>
            </div>
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li><a href="{{url('/shop')}}">Shop</a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li>Track Order</li>
                </ul>
            </div>
        </div>
    </div>


    <tracking-order raw_order="{{$order ?? ""}}" tracking_number="{{$tracking_number ?? ""}}"></tracking-order>

@endsection
