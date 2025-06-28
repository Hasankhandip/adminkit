@php
    $bannerContent = App\Models\Frontend\FrontendBanner::first();
@endphp

@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">
            @lang('Manage Banner Content')
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Banner Title')</label>
                            <input type="text" class="form-control" required name="title"
                                value="{{ @$bannerContent->title }}" placeholder="@lang('Enter title')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Banner Description')</label>
                            <textarea class="form-control" required rows="4" name="description" placeholder="@lang('Enter description')">{{ __(@$bannerContent->description) }}</textarea>
                            @error('description')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Banner Button name')</label>
                                    <input type="text" class="form-control" required name="button_name_one"
                                        value="{{ @$bannerContent->button_name_one }}" placeholder="@lang('Enter name')">
                                    @error('button_name_one')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Banner Button Link')</label>
                                    <input type="text" class="form-control" required name="button_link_one"
                                        value="{{ @$bannerContent->button_link_one }}" placeholder="@lang('Enter link address')">
                                    @error('button_link_one')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Banner Button name')</label>
                                    <input type="text" class="form-control" required name="button_name_two"
                                        value="{{ @$bannerContent->button_name_two }}" placeholder="@lang('Enter name')">
                                    @error('button_name_two')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Banner Button Link')</label>
                                    <input type="text" class="form-control" required name="button_link_two"
                                        value="{{ @$bannerContent->button_link_two }}" placeholder="@lang('Enter link address')">
                                    @error('button_link_two')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Banner Image')</label>
                            <input type="file" class="form-control" name="image" @required(!@$bannerContent->image)>
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
