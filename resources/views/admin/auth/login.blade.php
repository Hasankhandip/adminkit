@extends('admin.layouts.master')
@section('main-content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">@lang('Welcome back!')</h1>
                            <p class="lead">
                                @lang('Sign in to your account to continue');
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form action="{{ route('admin.login.attempt') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Email')</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                placeholder="Enter your email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Password')</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Enter your password" required>
                                        </div>
                                        <div>
                                            <div class="form-check align-items-center">
                                                <input id="customControlInline" type="checkbox" class="form-check-input"
                                                    value="remember-me" name="remember-me" checked="">
                                                <label class="form-check-label text-small"
                                                    for="customControlInline">@lang('Remember me')</label>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">@lang('Sign in')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            @lang("Don't have an account?") <a href="pages-sign-up.html">@lang('Sign up')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
