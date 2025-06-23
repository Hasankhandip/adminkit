@extends('frontend.layouts.app')
@section('content')
    @include('frontend.section.banner')
    @include('frontend.section.about')
    @include('frontend.section.service')
    @include('frontend.section.work')
    @include('frontend.section.product')
    @include('frontend.section.blog')

    <a class="scrollToTop active" href="#0"><i class="las la-chevron-up"></i></a>
@endsection
