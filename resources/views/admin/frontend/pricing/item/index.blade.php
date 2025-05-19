@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.pricing.item.create') }}" class="btn btn-primary">@lang('Add Pricing Item')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card scroll">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Price')</th>
                            <th>@lang('Info_icon_one')</th>
                            <th>@lang('Info_name_one')</th>
                            <th>@lang('Info_icon_two')</th>
                            <th>@lang('Info_name_two')</th>
                            <th>@lang('Info_icon_three')</th>
                            <th>@lang('Info_name_three')</th>
                            <th>@lang('button_link')</th>
                            <th>@lang('button_name')</th>
                            <th>@lang('action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pricingContents as $pricingItem)
                            <tr>
                                <td>{{ __($pricingItem->name) }}</td>
                                <td>{{ __($pricingItem->price) }}</td>
                                <td>{{ __($pricingItem->info_icon_one) }}</td>
                                <td>{{ __($pricingItem->info_name_one) }}</td>
                                <td>{{ __($pricingItem->info_icon_two) }}</td>
                                <td>{{ __($pricingItem->info_name_two) }}</td>
                                <td>{{ __($pricingItem->info_icon_three) }}</td>
                                <td>{{ __($pricingItem->info_name_three) }}</td>
                                <td>{{ __($pricingItem->button_link) }}</td>
                                <td>{{ __($pricingItem->button_name) }}</td>
                                <td>
                                    <a href="{{ route('admin.frontend.pricing.item.edit', $pricingItem->id) }}"
                                        class="btn btn-primary mb-1">@lang('Edit')</a>
                                    <a href="{{ route('admin.frontend.pricing.item.delete', $pricingItem->id) }}"
                                        class="btn btn-danger"
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
