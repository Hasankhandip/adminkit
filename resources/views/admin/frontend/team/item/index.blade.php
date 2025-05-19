@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.team.item.create') }}" class="btn btn-primary">@lang('Add Team Member')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card scroll">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>@lang('image')</th>
                            <th>@lang('name')</th>
                            <th>@lang('designation')</th>
                            <th>@lang('social_icon_one')</th>
                            <th>@lang('social_link_one')</th>
                            <th>@lang('social_icon_two')</th>
                            <th>@lang('social_link_two')</th>
                            <th>@lang('social_icon_three')</th>
                            <th>@lang('social_link_three')</th>
                            <th>@lang('social_icon_four')</th>
                            <th>@lang('social_link_four')</th>
                            <th>@lang('action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teamItemContents as $teamItem)
                            <tr>
                                <td>
                                    <img class="card-item-img"
                                        src="{{ asset('assets/images/frontend/team/images/' . $teamItem->image) }}"
                                        alt="">
                                </td>
                                <td>{{ __($teamItem->name) }}</td>
                                <td>{{ __($teamItem->designation) }}</td>
                                <td>{{ __($teamItem->social_icon_one) }}</td>
                                <td>{{ __($teamItem->social_link_one) }}</td>
                                <td>{{ __($teamItem->social_icon_two) }}</td>
                                <td>{{ __($teamItem->social_link_two) }}</td>
                                <td>{{ __($teamItem->social_icon_three) }}</td>
                                <td>{{ __($teamItem->social_link_three) }}</td>
                                <td>{{ __($teamItem->social_icon_four) }}</td>
                                <td>{{ __($teamItem->social_link_four) }}</td>
                                <td>
                                    <a href="{{ route('admin.frontend.team.item.edit', $teamItem->id) }}"
                                        class="btn btn-primary mb-1">@lang('Edit')</a>
                                    <a href="{{ route('admin.frontend.team.item.delete', $teamItem->id) }}"
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
