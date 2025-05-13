@extends('frontend.layouts.app')
@section('content')
    @include('frontend.partials.banner')
    @include('frontend.partials.about')
    @include('frontend.partials.service')
    @include('frontend.partials.work')
    @include('frontend.partials.pricing-plan')
    @include('frontend.partials.modal')
    <div class="padding-bottom">
        @include('frontend.partials.referral')
    </div>
    @include('frontend.partials.team')
    @include('frontend.partials.product')
    @include('frontend.partials.testimonial')
    @include('frontend.partials.blog')

    <a class="scrollToTop active" href="#0"><i class="las la-chevron-up"></i></a>
@endsection
