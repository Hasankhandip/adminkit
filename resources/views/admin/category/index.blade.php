@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">@lang('Manage Category')</h1>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">@lang('Add Category')</a>
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
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ __($category->name) }}</td>
                                <td>
                                    <img class="card-item-img" src="{{ getImage('category/', $category->image) }}"
                                        alt="">
                                </td>
                                <td>
                                    @if ($category->status)
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
                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="btn btn-primary m-1">@lang('Edit')</a>
                                        <a href="{{ route('admin.category.delete', $category->id) }}"
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
