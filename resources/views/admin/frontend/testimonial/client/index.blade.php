@php
    $testimonialClientContents = App\Models\Frontend\FrontendTestimonialClient::first();
@endphp
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.testimonial.client.create') }}" class="btn btn-primary">@lang('Add Testimonial Item')</a>
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
                            <th>@lang('description')</th>
                            <th>@lang('action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonialClientContents as $testimonialClient)
                            <tr>
                                <td>
                                    <img class="card-item-img"
                                        src="{{ asset('assets/images/frontend/testimonial/item/images/' . $testimonialClient->image) }}"
                                        alt="">
                                </td>
                                <td>{{ __($testimonialClient->name) }}</td>
                                <td>{{ __($testimonialClient->description) }}</td>
                                <td>{{ __($testimonialClient->designation) }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.frontend.testimonial.client.edit', $testimonialClient->id) }}"
                                            class="btn btn-primary m-1">@lang('Edit')</a>
                                        <a href="{{ route('admin.frontend.testimonial.client.delete', $testimonialClient->id) }}"
                                            class="btn btn-danger m-1"
                                            onclick="return confirm('Are you sure delete this?')">@lang('Delete')</a>
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
