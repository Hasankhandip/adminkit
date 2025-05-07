@extends('admin.layouts.app')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            @if (session('success'))
                <h2 class="text-success mb-3">{{ session('success') }}</h2>
            @endif
            <div class="d-flex justify-content-between mb-3 flex-wrap  gap-2">
                <h1 class="h3 mb-3">{{ __($pageTitle) }}</h1>
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">@lang('Add Category')</a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="d-none d-md-table-cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <img class="card-item-img" src="{{ asset('images/' . $category->image) }}"
                                                alt="">
                                        </td>
                                        <td><span class="badge bg-success">Done</span></td>
                                        <td>
                                            <button class="btn btn-primary">Edit</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
