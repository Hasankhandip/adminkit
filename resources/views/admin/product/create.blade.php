@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary">
            @lang('Product List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Name')</label>
                            <input type="text" class="form-control" required name="name" value="{{ old('name') }}"
                                placeholder="@lang('Enter product name')">
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brand_id" class="form-label">@lang('Brand')</label>
                            <select name="brand_id" id="brand_id" class="form-select" required>
                                <option value="">@lang('Select a Brand')</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ __($brand->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">@lang('Category')</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">@lang('Select a Category')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ __($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Thumbnail')</label>
                            <input type="file" class="form-control" required name="thumbnail">
                            @error('thumbnail')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Product Description')</label>
                            <textarea class="form-control" required rows="4" name="description" placeholder="@lang('Enter product description')">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Product Price')</label>
                            <input type="number" min="0" class="form-control" required name="price"
                                value="{{ old('price') }}" placeholder="@lang('Enter product amount')">
                            @error('price')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">@lang('Product Images Upload Here')</label>
                            <input class="form-control" type="file" name="image_gallery[]" multiple id="formFileMultiple"
                                multiple>
                            @error('image_gallery')
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
