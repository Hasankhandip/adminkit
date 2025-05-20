@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.footer.item.index') }}" class="btn btn-primary">@lang('Footer Item List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.footer.item.update', $frontendFooterItem->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Item Title')</label>
                            <input type="text" class="form-control" required name="title"
                                value="{{ $frontendFooterItem->title }}" placeholder="@lang('Enter title')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Item Name')</label>
                            <input type="text" class="form-control" required name="footer_name"
                                value="{{ $frontendFooterItem->footer_name }}" placeholder="@lang('Enter name')">
                            @error('footer_name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Item Link')</label>
                            <input type="text" class="form-control" required name="footer_link"
                                value="{{ $frontendFooterItem->footer_link }}" placeholder="@lang('Enter link')">
                            @error('footer_link')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
