@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.contact.item.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Email Name')</label>
                                    <input type="email" class="form-control" required name="email_name"
                                        value="{{ @$contactitemContent->email_name }}" placeholder="@lang('Enter email')">
                                    @error('email_name')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Email Link')</label>
                                    <input type="text" class="form-control" required name="email_link"
                                        value="{{ @$contactitemContent->email_link }}" placeholder="@lang('Enter email link')">
                                    @error('email_link')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Phone Number')</label>
                            <input type="number" class="form-control" required name="phone_number"
                                value="{{ @$contactitemContent->phone_number }}" placeholder="@lang('Enter number')">
                            @error('phone_number')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Address')</label>
                            <input type="text" class="form-control" required name="address"
                                value="{{ @$contactitemContent->address }}" placeholder="@lang('Enter address')">
                            @error('address')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">@lang('Map Link')</label>
                            <input type="text" class="form-control" required name="map_link"
                                value="{{ @$contactitemContent->map_link }}" placeholder="@lang('Enter map link')">
                            @error('map_link')
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
