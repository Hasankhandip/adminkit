@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.footer.contact.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Contact Address')</label>
                            <input type="text" class="form-control" required name="address"
                                value="{{ @$footerContactContent->address }}" placeholder="@lang('Enter address')">
                            @error('address')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Contact Number')</label>
                            <input type="text" class="form-control" required name="phone"
                                value="{{ @$footerContactContent->phone }}" placeholder="@lang('Enter phone number')">
                            @error('phone')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Footer Contact Email')</label>
                            <input type="text" class="form-control" required name="email"
                                value="{{ @$footerContactContent->email }}" placeholder="@lang('Enter email')">
                            @error('email')
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
