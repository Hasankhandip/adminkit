@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.blog.item.create') }}" class="btn btn-primary">@lang('Add Blog Item')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card scroll">
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>@lang('image')</th>
                            <th>@lang('date')</th>
                            <th>@lang('title')</th>
                            <th>@lang('blog_link')</th>
                            <th>@lang('description')</th>
                            <th>@lang('button_name')</th>
                            <th>@lang('button_link')</th>
                            <th>@lang('action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogItemContents as $blogItem)
                            <tr>
                                <td>
                                    <img class="card-item-img"
                                        src="{{ getImage('frontend/blog/item/images/', $blogItem->image) }}" alt="">
                                </td>
                                <td>{{ __($blogItem->date) }}.{{ __($blogItem->month) }}.{{ __($blogItem->year) }}</td>
                                <td>{{ __($blogItem->title) }}</td>
                                <td>{{ __($blogItem->blog_link) }}</td>
                                <td>{{ __($blogItem->description) }}</td>
                                <td>{{ __($blogItem->button_name) }}</td>
                                <td>{{ $blogItem->button_link }}</td>
                                <td>
                                    <a href="{{ route('admin.frontend.blog.item.edit', $blogItem->id) }}"
                                        class="btn btn-primary m-1">@lang('Edit')</a>
                                    <a href="{{ route('admin.frontend.blog.item.delete', $blogItem->id) }}"
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
