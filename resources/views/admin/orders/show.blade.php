@extends('admin.layouts.base')


@section('title')
    Order - {{$order->tracking_number}}
@endsection

@section('styles')

@endsection

@section('content')

    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('orders.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Order - {{$order->tracking_number}}</h1>
    </div>

    <div class="section-body" style="">

        <div class="row">

            <div class="col-12" >

                <div class="card" style="padding: 20px">

                    <view-order raw_statuses="{{json_encode($statuses)}}" raw_order = "{{$order}}"></view-order>

                </div>


            </div>

        </div>

    </div>

@endsection

@section('scripts')

@endsection
