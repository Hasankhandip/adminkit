@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3 flex-wrap  gap-2">
        <h1 class="h3 mb-3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">@lang('Add Brands')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Image')</th>
                            <th>@lang('Status')</th>
                            <th class="d-none d-md-table-cell">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ __($brand->name) }}</td>
                                <td>
                                    <img class="card-item-img" src="{{ asset('images/' . $brand->image) }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('admin.brand.status', $brand->id) }}"
                                        class="btn btn-{{ $brand->status ? 'success' : 'danger' }}">
                                        {{ __($brand->status ? 'Enable' : 'Disable') }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                        class="btn btn-primary">@lang('Edit')</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
