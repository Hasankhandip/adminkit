@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">@lang('Manage Service Item')</h1>
        <a href="{{ route('admin.frontend.service.item.create') }}" class="btn btn-primary">@lang('Add Service Item')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">


                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>@lang('S.N')</th>
                                <th>@lang('Icon')</th>
                                <th>@lang('Title')</th>
                                <th>@lang('Description')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($serviceItemContents as $serviceItem)
                                <tr>
                                    <td>{{ $loop->index + $serviceItemContents->firstItem() }}</td>
                                    <td>
                                        <i class="{{ $serviceItem->icon }}"></i>
                                    </td>
                                    <td>{{ __($serviceItem->title) }}</td>
                                    <td>{{ __($serviceItem->description) }}</td>
                                    <td>
                                        <a href="{{ route('admin.frontend.service.item.edit', $serviceItem->id) }}"
                                            class="btn btn-primary m-1">@lang('Edit')</a>
                                        <a href="{{ route('admin.frontend.service.item.delete', $serviceItem->id) }}"
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
                @if ($serviceItemContents->hasPages())
                    <div class="card-footer">
                        {{ $serviceItemContents->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
