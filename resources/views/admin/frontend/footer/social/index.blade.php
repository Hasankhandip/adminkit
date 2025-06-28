@php
    $footerSocial = App\Models\Frontend\FrontendFooterSocial::first();
@endphp

@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">@lang('Manage Footer Social')</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.footer.social.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Contact Telegram Link')</label>
                            <input type="text" class="form-control" required name="telegram_link"
                                value="{{ @$footerSocialContent->telegram_link }}" placeholder="@lang('Enter link')">
                            @error('telegram_link')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Contact Youtube Link')</label>
                            <input type="text" class="form-control" required name="youtube_link"
                                value="{{ @$footerSocialContent->youtube_link }}" placeholder="@lang('Enter link')">
                            @error('youtube_link')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Contact Twitter Link')</label>
                            <input type="text" class="form-control" required name="twitter_link"
                                value="{{ @$footerSocialContent->youtube_link }}" placeholder="@lang('Enter link')">
                            @error('twitter_link')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Contact Facebook Link')</label>
                            <input type="text" class="form-control" required name="facebook_link"
                                value="{{ @$footerSocialContent->facebook_link }}" placeholder="@lang('Enter link')">
                            @error('facebook_link')
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
