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
                                    <label class="form-label">@lang('Social Icon')</label>
                                    <input type="text" class="form-control" name="social_icon_one"
                                        value="{{ old('social_icon_one') }}" placeholder="@lang('Enter social icon')">
                                    @error('social_icon_one')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Social Link')</label>
                                    <input type="text" class="form-control" name="social_link_one"
                                        value="{{ old('social_link_one') }}" placeholder="@lang('Enter social link')">
                                    @error('social_link_one')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Social Icon')</label>
                                    <input type="text" class="form-control" name="social_icon_two"
                                        value="{{ old('social_icon_two') }}" placeholder="@lang('Enter social icon')">
                                    @error('social_icon_two')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Social Link')</label>
                                    <input type="text" class="form-control" name="social_link_two"
                                        value="{{ old('social_link_two') }}" placeholder="@lang('Enter social link')">
                                    @error('social_link_two')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Social Icon')</label>
                                    <input type="text" class="form-control" name="social_icon_three"
                                        value="{{ old('social_icon_three') }}" placeholder="@lang('Enter social icon')">
                                    @error('social_icon_three')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Social Link')</label>
                                    <input type="text" class="form-control" name="social_link_three"
                                        value="{{ old('social_link_three') }}" placeholder="@lang('Enter social link')">
                                    @error('social_link_three')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Social Icon')</label>
                                    <input type="text" class="form-control" name="social_icon_four"
                                        value="{{ old('social_icon_four') }}" placeholder="@lang('Enter social icon')">
                                    @error('social_icon_four')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Social Link')</label>
                                    <input type="text" class="form-control" name="social_link_four"
                                        value="{{ old('social_link_four') }}" placeholder="@lang('Enter social link')">
                                    @error('social_link_four')
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
