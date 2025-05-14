@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3 flex-wrap  gap-2">
        <h1 class="h3 mb-3">{{ __($pageTitle) }}</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontendAbout.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('About Subtitle')</label>
                            <input type="text" class="form-control" required name="subtitle"
                                value="{{ __(@$aboutContents->subtitle) }}" placeholder="@lang('Enter subtitle')">
                            @error('subtitle')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('About Title')</label>
                            <input type="text" class="form-control" required name="title"
                                value="{{ __(@$aboutContents->title) }}" placeholder="@lang('Enter title')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('About Description')</label>
                            <textarea class="form-control" required rows="4" name="description" placeholder="@lang('Enter description')">{{ __($aboutContents->description) }}</textarea>
                            @error('description')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <label class="form-label">@lang('* About Button 1')</label>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('About Button name')</label>
                                    <input type="text" class="form-control" required name="button_name_1"
                                        value="{{ __(@$aboutContents->button_name_1) }}" placeholder="@lang('Enter name')">
                                    @error('button_name_1')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('About Button Link')</label>
                                    <input type="text" class="form-control" required name="button_link_1"
                                        value="{{ __(@$aboutContents->button_link_1) }}" placeholder="@lang('Enter link address')">
                                    @error('button_link_1')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('About Image')</label>
                            <input type="file" class="form-control" required name="image">
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
