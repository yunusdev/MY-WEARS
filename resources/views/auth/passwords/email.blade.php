@extends('layouts.base')
@section('title')
    Forgot Password
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="column">
                <h1>Forgot Password</h1>
            </div>
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li>Forgot Password</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
        <div class="row">
            <div class="col-md-6 mx-auto">

                <form  method="POST" action="{{ route('password.email') }}" class="login-box">
                    @if (session('status'))
                        <div class="alert alert-success alert-has-icon">
                            <div class="alert-body font-weight-bold">
                                <span class="alert-icon" style="margin-right: 10px"><i class="far fa-lightbulb"></i></span>
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    @csrf
                    <h4 class="margin-bottom-1x margin-top-1x text-center">Forgot Password</h4>
                    <div class="form-group input-group mb-40" style="">
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="input-group-addon"><i class="icon-mail"></i></span>
                        @error('email')
                        <div class="invalid-tooltip " style="margin-bottom: 35px !important;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-center text-sm-right margin-bottom-1x">
                        <button class="btn btn-rounded btn-primary margin-bottom-none" type="submit">Send Password Link</button>
                    </div>
                    <div class="text-center justify-content-between padding-bottom-1x">
                        <a class="navi-link underline" href="{{ route('login') }}">Sign in</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
