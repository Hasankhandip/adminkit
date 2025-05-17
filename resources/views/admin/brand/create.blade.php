@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.brand.index') }}" class="btn btn-primary">
            @lang('Brand List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Name')</label>
                            <input type="text" class="form-control" required name="name" value="{{ old('name') }}"
                                placeholder="@lang('Enter your brand name')">
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('image')</label>
                            <input type="file" class="form-control" required name="image" value="{{ old('image') }}">
                            @error('image')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
