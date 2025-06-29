@php
    $workItemContents = App\Models\Frontend\FrontendWorkItem::orderBy('id', 'asc')->get();
@endphp
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">@lang('Manage Work Item')</h1>
        <a href="{{ route('admin.frontend.work.item.create') }}" class="btn btn-primary">@lang('Add Work Item')</a>
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
                        @forelse ($workItemContents as $workItem)
                            <tr>
                                <td>{{ __($workItem->icon) }}</td>
                                <td>{{ __($workItem->title) }}</td>
                                <td>{{ __($workItem->description) }}</td>
                                <td>
                                    <a href="{{ route('admin.frontend.work.item.edit', $workItem->id) }}"
                                        class="btn btn-primary m-1">@lang('Edit')</a>
                                    <a href="{{ route('admin.frontend.work.item.delete', $workItem->id) }}"
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
