@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.service.item.index') }}" class="btn btn-primary">@lang('Service Item List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.service.item.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Service Item Icon')</label>
                            <input type="text" class="form-control" required name="icon" value="{{ old('icon') }}"
                                placeholder="@lang('Enter item icon')">
                            @error('icon')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Service Item Title')</label>
                            <input type="text" class="form-control" required name="title" value="{{ old('title') }}"
                                placeholder="@lang('Enter item title')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Service Item Description')</label>
                            <textarea class="form-control" required rows="4" name="description" value="{{ old('description') }}"
                                placeholder="@lang('Enter description')"></textarea>
                            @error('description')
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
