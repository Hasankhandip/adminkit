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
                    <form action="{{ route('admin.frontend.product.item.update', $frontendProductItem->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Product Image')</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Product Name')</label>
                            <input type="text" class="form-control" required name="name"
                                value="{{ $frontendProductItem->name }}" placeholder="@lang('Enter name')">
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Stock')</label>
                            <select class="form-control" name="stock">
                                <option value="1" @selected($frontendProductItem->stock == '1')>
                                    @lang('In Stock')
                                </option>
                                <option value="0" @selected($frontendProductItem->stock == '0')>
                                    @lang('Out of Stock')
                                </option>
                            </select>
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Product Price')</label>
                            <input type="number" class="form-control" min="0" required name="price"
                                value="{{ $frontendProductItem->price }}" placeholder="@lang('Enter price')">
                            @error('price')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Button Name')</label>
                                    <input type="text" class="form-control" name="button_name"
                                        value="{{ $frontendProductItem->button_name }}" placeholder="@lang('Enter button name')">
                                    @error('button_name')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Button Link')</label>
                                    <input type="text" class="form-control" name="button_link"
                                        value="{{ $frontendProductItem->button_link }}" placeholder="@lang('Enter button link')">
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
