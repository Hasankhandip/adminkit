@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3 flex-wrap  gap-2">
        <h1 class="h3 mb-3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.service.item.create') }}" class="btn btn-primary">@lang('Add Service Item')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>@lang('Icon')</th>
                            <th>@lang('Title')</th>
                            <th>@lang('Description')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($serviceItemContents as $serviceItem)
                            <tr>
                                <td>{{ __($serviceItem->icon) }}</td>
                                <td>{{ __($serviceItem->title) }}</td>
                                <td>{{ __($serviceItem->description) }}</td>


                                <td class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="btn btn-primary me-1">@lang('Edit')</a>
                                    <a href="#" class="btn btn-danger">@lang('Delete')</a>
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
