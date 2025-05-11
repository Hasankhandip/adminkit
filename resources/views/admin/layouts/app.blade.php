@extends('admin.layouts.master')
@section('main-content')
    <div class="wrapper">
        @include('admin.partials.sidebar')
        <div class="main">
            @include('admin.partials.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    @if (session('success'))
                        <div class="row">
                            <div class="col-12">
                                <div class="p-3 bg-success rounded mb-4 shadow">
                                    <h4 class="text-dark fw-bold">{{ session('success') }}</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="row">
                            <div class="col-12">
                                <div class="p-3 bg-danger rounded mb-4 shadow">
                                    <h4 class="text-dark fw-bold">{{ session('error') }}</h4>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if ($errors->any())
                        <div class="alert alert-danger text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </main>
            @include('admin.partials.footer')
        </div>
    </div>
@endsection
