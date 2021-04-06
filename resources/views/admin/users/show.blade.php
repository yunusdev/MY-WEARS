@extends('admin.layouts.base')

@section('title')
    View User
@endsection

@section('content')

<div class="section-header">
    <div class="section-header-back">
        <a href="{{route('users.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>User - {{$user->name}}</h1>
</div>

<div class="section-body" style="">

    <div class="row">
        <div class="col-12">

            <div class="card " style="padding: 20px">
                <!-- form start -->

                <view-user raw_user = "{{$user}}"></view-user>

            </div>

        </div>

    </div>

</div>

@endsection

@section('scripts')

@endsection
