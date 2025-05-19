@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.product.item.index') }}" class="btn btn-primary">@lang('Product Item  List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.product.item.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Product Image')</label>
                            <input type="file" class="form-control" required name="image">
                            @error('image')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Product Name')</label>
                            <input type="text" class="form-control" required name="name" value="{{ old('name') }}"
                                placeholder="@lang('Enter name')">
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Product Price')</label>
                            <input type="number" class="form-control" min="0" required name="price"
                                value="{{ old('price') }}" placeholder="@lang('Enter price')">
                            @error('price')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Button Name')</label>
                                    <input type="text" class="form-control" name="button_name"
                                        value="{{ old('button_name') }}" placeholder="@lang('Enter button name')">
                                    @error('button_name')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Button Link')</label>
                                    <input type="text" class="form-control" name="button_link"
                                        value="{{ old('button_link') }}" placeholder="@lang('Enter button link')">
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
