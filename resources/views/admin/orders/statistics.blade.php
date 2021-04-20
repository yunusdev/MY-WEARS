@extends('admin.layouts.base')


@section('title')
    Order Statistics
@endsection

@section('styles')

@endsection

@section('content')

    <div class="section-header">
        <h1>Orders Statistics</h1>
    </div>

    <div class="section-body" style="">

        <div class="row">

            <div class="col-12" >

                <div class="card" style="padding: 20px">

                    <orders-stats ></orders-stats>

                </div>


            </div>

        </div>

    </div>

@endsection

@section('scripts')



@endsection
