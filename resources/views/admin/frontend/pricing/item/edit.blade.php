@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-4 flex-wrap  gap-2">
        <h1 class="h3">{{ __($pageTitle) }}</h1>
        <a href="{{ route('admin.frontend.pricing.item.index') }}" class="btn btn-primary">@lang('Pricing Item List')</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.frontend.pricing.item.update', $frontendPricingItem->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">@lang('Pricing Item Price')</label>
                            <input type="text" class="form-control" required name="price"
                                value="{{ $frontendPricingItem->price }}" placeholder="@lang('Enter item price')">
                            @error('price')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">@lang('Pricing Item Name')</label>
                            <input type="text" class="form-control" required name="name"
                                value="{{ $frontendPricingItem->name }}" placeholder="@lang('Enter item name')">
                            @error('name')
                                <p class="text-danger pt-2">{{ __($message) }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Pricing Item Info Icon')</label>
                                    <input type="text" class="form-control" required name="info_icon_one"
                                        value="{{ $frontendPricingItem->info_icon_one }}" placeholder="@lang('Enter info icon ')">
                                    @error('info_icon_one')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Pricing Item Info Name')</label>
                                    <input type="text" class="form-control" required name="info_name_one"
                                        value="{{ $frontendPricingItem->info_name_one }}" placeholder="@lang('Enter info name ')">
                                    @error('info_name_one')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Pricing Item Info Icon')</label>
                                    <input type="text" class="form-control" name="info_icon_two"
                                        value="{{ $frontendPricingItem->info_icon_two }}" placeholder="@lang('Enter info icon ')">
                                    @error('info_icon_two')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Pricing Item Info Name')</label>
                                    <input type="text" class="form-control" name="info_name_two"
                                        value="{{ $frontendPricingItem->info_name_two }}" placeholder="@lang('Enter info name ')">
                                    @error('info_name_two')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Pricing Item Info Icon')</label>
                                    <input type="text" class="form-control" name="info_icon_three"
                                        value="{{ $frontendPricingItem->info_icon_three }}"
                                        placeholder="@lang('Enter info icon ')">
                                    @error('info_icon_three')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Pricing Item Info Name')</label>
                                    <input type="text" class="form-control" name="info_name_three"
                                        value="{{ $frontendPricingItem->info_name_three }}"
                                        placeholder="@lang('Enter info name ')">
                                    @error('info_name_three')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Pricing Item Button Link')</label>
                                    <input type="text" class="form-control" required name="button_link"
                                        value="{{ $frontendPricingItem->button_link }}" placeholder="@lang('Enter button link ')">
                                    @error('button_link')
                                        <p class="text-danger pt-2">{{ __($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Pricing Item Button Name')</label>
                                    <input type="text" class="form-control" required name="button_name"
                                        value="{{ $frontendPricingItem->button_name }}" placeholder="@lang('Enter button name ')">
                                    @error('button_name')
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
