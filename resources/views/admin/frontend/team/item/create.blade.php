@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.work.item.index') }}" class="btn btn-primary">@lang('Team Member List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.team.item.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Team Member Image')</label>
                            <input type="file" class="form-control" required name="image">
                            @error('image')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Team Member Name')</label>
                            <input type="text" class="form-control" required name="name" value="{{ old('name') }}"
                                placeholder="@lang('Enter name')">
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Team Member Designation')</label>
                            <input type="text" class="form-control" required name="designation"
                                value="{{ old('designation') }}" placeholder="@lang('Enter designation')">
                            @error('designation')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Telegram Link')</label>
                                    <input type="text" class="form-control" name="telegram_link"
                                        value="{{ old('telegram_link') }}" placeholder="@lang('Enter telegram link')">
                                    @error('telegram_link')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Youtube Link')</label>
                                    <input type="text" class="form-control" name="youtube_link"
                                        value="{{ old('youtube_link') }}" placeholder="@lang('Enter youtube link')">
                                    @error('youtube_link')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Twitter Link')</label>
                                    <input type="text" class="form-control" name="twitter_link"
                                        value="{{ old('twitter_link') }}" placeholder="@lang('Enter twitter link')">
                                    @error('twitter_link')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Facebook Link')</label>
                                    <input type="text" class="form-control" name="facebook_link"
                                        value="{{ old('facebook_link') }}" placeholder="@lang('Enter facebook link')">
                                    @error('facebook_link')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
