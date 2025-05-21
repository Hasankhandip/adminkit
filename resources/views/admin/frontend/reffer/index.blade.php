@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.reffer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Reffer Title')</label>
                            <input type="text" class="form-control" required name="title"
                                placeholder="@lang('Enter title')" value="{{ @$refferContent->title }}">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Reffer Description')</label>
                            <textarea class="form-control" required rows="4" name="description" placeholder="@lang('Enter description')">{{ @$refferContent->description }}</textarea>
                            @error('description')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Reffer Button name')</label>
                                    <input type="text" class="form-control" required name="button_name"
                                        placeholder="@lang('Enter name')" value="{{ @$refferContent->button_name }}">
                                    @error('button_name')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Reffer Button Link')</label>
                                    <input type="text" class="form-control" required name="button_link"
                                        placeholder="@lang('Enter link address')" value="{{ @$refferContent->button_link }}">
                                    @error('button_link')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Reffer Thumb')</label>
                            <input type="file" class="form-control" name="image">
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
