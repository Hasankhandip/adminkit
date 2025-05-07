@extends('admin.layouts.master')
@section('main-content')
    <div class="wrapper">
        @include('admin.partials.sidebar')
        <div class="main">
            @include('admin.partials.navbar')
            @yield('content')

            @include('admin.partials.footer')
        </div>
    </div>
@endsection
