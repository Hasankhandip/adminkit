@extends('frontend.layouts.app')
@section('content')
    @include('frontend.partials.inner-banner')
    @include('frontend.partials.blog.index')

    <a class="scrollToTop active" href="#0"><i class="las la-chevron-up"></i></a>
@endsection
