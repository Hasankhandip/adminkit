@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.footer.item.create') }}" class="btn btn-primary">@lang('Add Footer Item')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card scroll">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>@lang('title')</th>
                            <th>@lang('footer_link')</th>
                            <th>@lang('footer_name')</th>
                            <th>@lang('action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($footerItemContents as $footerItem)
                            <tr>
                                <td>{{ __($footerItem->title) }}</td>
                                <td>{{ __($footerItem->footer_link) }}</td>
                                <td>{{ __($footerItem->footer_name) }}</td>
                                <td>
                                    <a href="{{ route('admin.frontend.footer.item.edit', $footerItem->id) }}"
                                        class="btn btn-primary m-1">@lang('Edit')</a>
                                    <a href="{{ route('admin.frontend.footer.item.delete', $footerItem->id) }}"
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
