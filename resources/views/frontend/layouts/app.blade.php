@extends('frontend.layouts.master')
@section('main-content')
    @include('frontend.partials.preloader')
    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')
@endsection
