@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3 flex-wrap  gap-2">
        <h1 class="h3 mb-3">{{ __($pageTitle) }}</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Banner Title')</label>
                            <input type="text" class="form-control" required name="title" value="{{ old('title') }}"
                                placeholder="@lang('Enter title')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Banner Description')</label>
                            <textarea class="form-control" required rows="4" name="description" placeholder="@lang('Enter description')">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <label class="form-label">@lang('* Banner Button 1')</label>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Banner Button name')</label>
                                    <input type="text" class="form-control" required name="button_name_1"
                                        value="{{ old('button_name_1') }}" placeholder="@lang('Enter name')">
                                    @error('button_name_1')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Banner Button Link')</label>
                                    <input type="text" class="form-control" required name="button_link_1"
                                        value="{{ old('button_name_1') }}" placeholder="@lang('Enter link address')">
                                    @error('button_link_1')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label">@lang('* Banner Button 2')</label>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Banner Button name')</label>
                                    <input type="text" class="form-control" required name="button_name_2"
                                        value="{{ old('button_name_2') }}" placeholder="@lang('Enter name')">
                                    @error('button_name_2')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Banner Button Link')</label>
                                    <input type="text" class="form-control" required name="button_link_2"
                                        value="{{ old('button_link_2') }}" placeholder="@lang('Enter link address')">
                                    @error('button_link_2')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Banner Image')</label>
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
