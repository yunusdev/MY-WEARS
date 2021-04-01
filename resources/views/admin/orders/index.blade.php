@extends('admin.layouts.base')


@section('title')
{{$title}}
@endsection

@section('styles')

@endsection

@section('content')

    <div class="section-header">
        @if(isset($user))
        <div class="section-header-back">
            <a href="{{route('users.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        @endif
            @if(isset($coupon))
                <div class="section-header-back">
                    <a href="{{route('coupons.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
            @endif
        <h1>{{$title}}</h1>
    </div>

    <div class="section-body" style="">

        <div class="row">

            <div class="col-12" >

                <div class="card" style="padding: 20px">

                    <orders raw_coupon="{{$coupon ?? ''}}" raw_user="{{$user ?? ''}}"></orders>

                </div>


            </div>

        </div>

    </div>

@endsection

@section('scripts')

@endsection
