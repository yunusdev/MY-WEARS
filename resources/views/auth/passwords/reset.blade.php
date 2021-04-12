@extends('layouts.base')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="column">
                <h1>Reset Password</h1>
            </div>
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li>Reset Password</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
        <div class="row">
            <div class="col-md-6 mx-auto">

                <form  method="POST" action="{{ route('password.update') }}" class="login-box">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <h4 class="margin-bottom-1x margin-top-1x text-center">Reset Password</h4>
                    <div class="form-group input-group mb-40" style="">
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="input-group-addon"><i class="icon-mail"></i></span>
                        @error('email')
                        <div class="invalid-tooltip " style="margin-bottom: 35px !important;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group input-group mb-40" >
                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
                        @error('password')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group input-group mb-40" >
                        <input class="form-control" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Password Confirmation" required><span class="input-group-addon"><i class="icon-lock"></i></span>
                    </div>
                    <div class="text-center text-sm-right margin-bottom-1x">
                        <button class="btn btn-rounded btn-primary margin-bottom-none" type="submit">Reset Password</button>
                    </div>
                    <div class="text-center justify-content-between padding-bottom-1x">
                        <a class="navi-link underline" href="{{ route('login') }}">Sign in</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
