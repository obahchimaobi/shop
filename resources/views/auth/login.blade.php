@extends('layouts.app')


@section('content')
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60 pt-60 mt-60">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 m-auto">
                <!-- Login Form s-->
                <form action="{{ route('user.login') }}" method="post" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.466);">

                    {{ csrf_field() }}
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>

                        @if (session('success'))
                            <h6 class="alert alert-success" style="font-weight: normal;"> {{session('success')}} </h6>
                        @endif

                        @if (session('error'))
                            <h6 class="alert alert-danger" style="font-weight: normal;"> {{session('error')}} </h6>
                        @endif
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address" name="email">

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password" name="password">

                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me" name="remember">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="#"> Forgotten password?</a>
                            </div>
                            <div class="col-md-8">
                                <button class="register-button mt-0">Login</button>
                            </div>

                            <div class="col-md-4 text-center">
                                <a href="{{ route('register-page') }}" class="register-button btn btn-secondary mt-0">Register</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->
@endsection
