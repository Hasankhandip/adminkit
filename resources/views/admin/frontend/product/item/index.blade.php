@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.product.item.create') }}" class="btn btn-primary">@lang('Add Product Item')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card scroll">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>@lang('image')</th>
                            <th>@lang('name')</th>
                            <th>@lang('stock')</th>
                            <th>@lang('price')</th>
                            <th>@lang('button_name')</th>
                            <th>@lang('button_link')</th>
                            <th>@lang('action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productItemContents as $productItem)
                            <tr>
                                <td>
                                    <img class="card-item-img"
                                        src="{{ asset('assets/images/frontend/product/item/images/' . $productItem->image) }}"
                                        alt="">
                                </td>
                                <td>{{ __($productItem->name) }}</td>
                                <td>
                                    @if ($productItem->stock)
                                        <span class="text-success">
                                            @lang('In Stock')
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            @lang('Out of Stock')
                                        </span>
                                    @endif
                                </td>
                                <td>{{ __($productItem->price) }}</td>
                                <td>{{ __($productItem->button_name) }}</td>
                                <td>{{ __($productItem->button_link) }}</td>
                                <td>
                                    <a href="{{ route('admin.frontend.product.item.edit', $productItem->id) }}"
                                        class="btn btn-primary m-1">@lang('Edit')</a>
                                    <a href="{{ route('admin.frontend.product.item.delete', $productItem->id) }}"
                                        class="btn btn-danger m-1"
                                        onclick="return confirm('Are you sure delete this?')">@lang('Delete')</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="100%" class="p-5">@lang('No data found')</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
