@extends('admin.layouts.base')


@section('title')
    Config
@endsection

@section('styles')

@endsection

@section('content')

    <div class="section-header">
        <h1>Config</h1>
    </div>

    <div class="section-body" style="">

        <div class="row">

            <div class="col-12" >

                <div class="card" style="padding: 20px">

                    <config raw_config="{{$config}}"></config>

                </div>


            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/mdb.js') }}"></script>

@endsection


