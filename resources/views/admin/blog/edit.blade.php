@php
    $blogContent = App\Models\Frontend\FrontendBlog::first();
@endphp

@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-primary">@lang('Blog Item  List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.blog.update', $blogContent->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Blog Image')</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <label class="form-label">@lang('Blog Date')</label>
                            <div class="col-lg-4 mb-3">
                                <input type="number" min="1" max="31" name="date" required
                                    class="form-control" value="{{ $blogContent->date }}">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <select name="month" id="month" required class="form-control">
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ \Carbon\Carbon::create()->month($month)->format('F') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <select name="year" id="year" required class="form-control">
                                    @foreach (range(now()->year, now()->year) as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Blog Title')</label>
                            <input type="text" class="form-control" required name="title"
                                value="{{ $blogContent->title }}" placeholder="@lang('Enter title')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Blog Link')</label>
                            <input type="text" class="form-control" required name="blog_link"
                                value="{{ $blogContent->blog_link }}" placeholder="@lang('Enter blog link')">
                            @error('blog_link')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Blog Description')</label>
                            <textarea class="form-control" required rows="4" name="description" placeholder="@lang('Enter description')">{{ $blogContent->description }}</textarea>
                            @error('description')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Button Name')</label>
                                    <input type="text" class="form-control" required name="button_name"
                                        value="{{ $blogContent->button_name }}" placeholder="@lang('Enter button name')">
                                    @error('button_name')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Button Link')</label>
                                    <input type="text" class="form-control" required name="button_link"
                                        value="{{ $blogContent->button_link }}" placeholder="@lang('Enter button link')">
                                    @error('button_link')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
