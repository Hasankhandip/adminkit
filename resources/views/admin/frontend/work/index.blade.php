@php
    $workContent = App\Models\Frontend\FrontendWork::first();
@endphp


@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">@lang('Manage Work Content')</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.work.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Work Title')</label>
                            <input type="text" class="form-control" required name="title"
                                value="{{ @$WorkContent->title }}" placeholder="@lang('Enter title')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Work Subtitle')</label>
                            <input type="text" class="form-control" required name="subtitle"
                                value="{{ @$WorkContent->subtitle }}" placeholder="@lang('Enter subtitle')">
                            @error('subtitle')
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
