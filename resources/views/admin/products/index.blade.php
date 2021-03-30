@extends('admin.layouts.base')


@section('title')
{{$title}}
@endsection

@section('styles')

@endsection

@section('content')

    <div class="section-header">
        <h1>{{$title}}</h1>
    </div>

    <div class="section-body" style="">

        <div class="row">

            <div class="col-12" >

                <div class="card" style="padding: 20px">

                    <products></products>

                </div>


            </div>

        </div>

    </div>

@endsection

@section('scripts')

@endsection
