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
                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Name')</label>
                            <input type="text" class="form-control" required name="name" value="{{ $product->name }}"
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
                                    <option value="{{ $brand->id }}" @selected($brand->id)>{{ __($brand->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">@lang('Category')</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">@lang('Select a Category')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($category->id)>
                                        {{ __($category->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Thumbnail')</label>
                            <input type="file" class="form-control" name="thumbnail">
                            @error('thumbnail')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Product Description')</label>
                            <textarea class="form-control" required rows="4" name="description" placeholder="@lang('Enter product description')">{{ $product->description }}</textarea>
                            @error('code')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Stock')</label>
                            <select class="form-control" name="stock">
                                <option value="1" @selected($product->stock == '1')>
                                    @lang('In Stock')
                                </option>
                                <option value="0" @selected($product->stock == '0')>
                                    @lang('Out of stock')
                                </option>
                            </select>
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Product Price')</label>
                            <input type="number" min="0" class="form-control" required name="price"
                                value="{{ $product->price }}" placeholder="@lang('Enter product amount')">
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
                        <div class="mb-3">
                            <div class="product-image-wrapper">
                                @foreach ($product->productImages as $productImage)
                                    <div class="product-image-item">
                                        <img class=""
                                            src="{{ getImage('product/image/', $productImage->image) }}" />
                                        <a href="{{ route('admin.product.delete.image', [$productImage->id, $product->id]) }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this image?')">
                                            @lang('Delete Image')
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
