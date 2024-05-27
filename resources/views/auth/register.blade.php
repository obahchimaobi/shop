@extends('layouts.app')


@section('content')
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60 pt-60 mt-60">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 m-auto">
                <!-- Login Form s-->
                <form action="{{ route('user.register') }}" method="post" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.466);">

                    {{ csrf_field() }}
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>

                        @if (session('error'))
                            <h6 class="alert alert-danger"> {{session('error')}} </h6>
                        @endif
                        
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>First Name</label>
                                <input class="mb-0" type="text" placeholder="First Name" name="first_name">

                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Last Name</label>
                                <input class="mb-0" type="text" placeholder="Last Name" name="last_name">

                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address" value="{{ old('email') }}" name="email">

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password" name="password">

                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password</label>
                                <input class="mb-0" type="password" placeholder="Confirm Password" name="password_confirmation">

                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-10 mb-20 text-left">
                                <a href="{{ route('login-page') }}"> Already have an account?</a>
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->
@endsection
