@extends('frontend.layouts.master')
@section('main-content')
    @include('frontend.partials.preloader')
    @include('frontend.partials.header')
    @yield('content')
    <a class="scrollToTop active" href="#0"><i class="las la-chevron-up"></i></a>
    @include('frontend.partials.footer')
@endsection
