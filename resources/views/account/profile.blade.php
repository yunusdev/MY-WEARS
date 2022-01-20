@extends('layouts.base')

@section('title')
    Profile
@endsection

@section('content')

    <div class="page-title">
        <div class="container">
            <div class="column">
                <h1>Profile</h1>
            </div>
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li><a href="#">Account</a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li>Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <user-profile raw_url="{{$url}}" raw_user="{{auth()->user()}}"></user-profile>

@endsection
