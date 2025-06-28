@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">@lang('Manage Category')</h1>
        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">
            @lang('Category List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Name')</label>
                            <input type="text" class="form-control" required name="name" value="{{ $category->name }}"
                                placeholder="@lang('Enter your category name')">
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Status')</label>
                            <select class="form-control" name="status">
                                <option value="1" @selected($category->status == '1')>@lang('Enable')</option>
                                <option value="0" @selected($category->status == '0')>
                                    @lang('Disable')
                                </option>
                            </select>
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('image')</label>
                            <input type="file" class="form-control" name="image" />
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
