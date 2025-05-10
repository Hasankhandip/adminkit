@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3 flex-wrap  gap-2">
        <h1 class="h3 mb-3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">@lang('Add Product')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Product Code')</th>
                            <th>@lang('Description')</th>
                            <th>@lang('Quantity')</th>
                            <th>@lang('Price')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    <div class="user">
                                        <div class="user-thumb">
                                            <img class="card-item-img"
                                                src="{{ asset('assets/images/product/' . $product->thumbnail) }}"
                                                alt="">
                                        </div>
                                        <span class="user-name">{{ __($product->name) }}</span>
                                    </div>
                                </td>
                                <td>
                                    {{ __($product->code) }}
                                </td>
                                <td>
                                    {{ __($product->description) }}
                                </td>
                                <td>
                                    {{ __($product->quantity) }}
                                </td>
                                <td>
                                    ${{ __($product->price) }}
                                </td>
                                <td><a href="{{ route('admin.product.edit', $product->id) }}"
                                        class="btn btn-primary">@lang('Edit')</a></td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
