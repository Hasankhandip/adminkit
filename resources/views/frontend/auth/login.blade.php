@extends('frontend.layouts.master')
@section('main-content')
    <section class="account-section">
        <div class="row g-0 flex-wrap-reverse">
            <div class="col-md-6 col-xl-5 col-lg-6">
                <div class="account-form-wrapper">
                    <div class="logo">
                        <a href="{{ route('index') }}"><img
                                src="https://script.viserlab.com/binaryecom/assets/images/logoIcon/logo.png"
                                alt="logo" /></a>
                    </div>
                    <form class="account-form verify-gcaptcha" action="{{ route('login.attempt') }}" method="POST">
                        @csrf
                        <div class="form--group">
                            <label class="form--label">@lang('Email')</label>
                            <input class="form-control form--control" name="email" type="email"
                                placeholder="@lang('Enter Email')" required />
                        </div>
                        <div class="form--group">
                            <label class="form--label">@lang('Password')</label>
                            <input class="form-control form--control" id="password" name="password" type="password"
                                placeholder="@lang('Enter Password')" required />
                        </div>
                        <div class="form--group custom--checkbox">
                            <input class="form--control" id="remember" name="remember" type="checkbox" />
                            <label class="form--label" for="remember"> @lang('Remember Me') </label>
                        </div>
                        <div class="form--group button-wrapper">
                            <button class="account--btn" type="submit">@lang('Sign In')</button>
                            <a class="custom--btn" href="{{ route('register.index') }}"><span>@lang('Create Account')</span></a>
                        </div>
                    </form>
                    <p class="text--dark">
                        @lang('Forgot your login credentials ?')
                        <a class="text--base ms-2"
                            href="https://script.viserlab.com/binaryecom/user/password/reset">@lang('Reset Password')</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-xl-7 col-lg-6">
                <div class="account-thumb">
                    <img src="{{ asset('assets/images/login/thumb/' . $loginContent->thumb) }}" alt="thumb" />
                    <div class="account-thumb-content">
                        <p class="welc">{{ $loginContent->subtitle }}</p>
                        <h3 class="title">{{ $loginContent->title }}</h3>
                        <p class="info">
                            {{ $loginContent->info }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape shape1">
            <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/08.png" alt="shape" />
        </div>
        <div class="shape shape2">
            <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/waves.png"
                alt="shape" />
        </div>
    </section>
@endsection
