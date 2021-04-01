@extends('admin.layouts.base')


@section('title')
{{$title}}
@endsection

@section('styles')

@endsection

@section('content')

    <div class="section-header">
        @if(isset($category))
            <div class="section-header-back">
                <a href="{{route('categories.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
        @endif
        @if(isset($sub_category))
            <div class="section-header-back">
                <a href="{{route('sub-categories.getAll')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
        @endif
        <h1>{{$title}}</h1>
    </div>

    <div class="section-body" style="">

        <div class="row">

            <div class="col-12" >

                <div class="card" style="padding: 20px">

                    <products raw_category="{{$category ?? ''}}" raw_sub_category="{{$sub_category ?? ''}}"></products>

                </div>


            </div>

        </div>

    </div>

@endsection

@section('scripts')

@endsection
