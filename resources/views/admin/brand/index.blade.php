@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">
            @lang('Add Brand')</a>
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
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                            <tr>
                                <td>{{ __($brand->name) }}</td>
                                <td>
                                    <img class="card-item-img" src="{{ asset('assets/images/brand/' . $brand->image) }}"
                                        alt="">
                                </td>
                                <td>
                                    @if ($brand->status)
                                        <span class="text-success">
                                            @lang('Enable')
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            @lang('Disable')
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                            class="btn btn-primary m-1">@lang('Edit')</a>
                                        <a href="{{ route('admin.brand.delete', $brand->id) }}"
                                            class="btn btn-danger m-1">@lang('Delete')</a>
                                    </div>
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
