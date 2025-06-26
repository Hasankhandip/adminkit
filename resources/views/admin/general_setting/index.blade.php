@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">@lang('Manage General Setting')</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.general.setting.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Site Title')</label>
                            <input type="text" class="form-control" required name="site_name"
                                value="{{ @$setting->site_name }}" placeholder="@lang('Enter title')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Timezone')</label>
                            <select name="timezone" class="form-control" required>
                                @foreach ($timezones as $timezone)
                                    <option value="{{ $timezone }}"
                                        {{ $timezone == $setting->timezone ? 'selected' : '' }}>
                                        {{ $timezone }}</option>
                                @endforeach
                            </select>
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">@lang('Currency')</label>
                            <input type="text" class="form-control" required name="currency_code"
                                value="{{ @$setting->currency_code }}" placeholder="@lang('Enter currency')">
                            @error('title')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label class="form-label">@lang('Currency Symbol')</label>
                            <input type="text" class="form-control" required name="currency_symbol"
                                value="{{ @$setting->currency_symbol }}" placeholder="@lang('Enter currency symbol')">
                            @error('title')
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
