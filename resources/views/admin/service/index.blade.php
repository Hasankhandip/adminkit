@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3 flex-wrap  gap-2">
        <h1 class="h3 mb-3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.service.create') }}" class="btn btn-primary">@lang('Add Service')</a>
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
                        @forelse ($services as $service)
                            <tr>
                                <td>{{ __($service->name) }}</td>
                                <td>
                                    <img class="card-item-img" src="{{ asset('assets/images/service/' . $service->image) }}"
                                        alt="">
                                </td>
                                <td>
                                    @if ($service->status)
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
                                    <a href="{{ route('admin.service.edit', $service->id) }}"
                                        class="btn btn-primary">@lang('Edit')</a>
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
