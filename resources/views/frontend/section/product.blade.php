@php
    $productContent = App\Models\Frontend\FrontendProduct::first();
    $products = App\Models\Product::take(8)->orderBy('id', 'desc')->get();
@endphp


<section class="product-section padding-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="section-header text-center">
                    <span class="subtitle">{{ __($productContent->title) }}</span>
                    <h2 class="title">{{ __($productContent->subtitle) }}</h2>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @include('frontend.partials.products')
            <div class="col-12 text-center">
                <a href="{{ route('product.index') }}" class="btn btn--base">@lang('View All Products')</a>
            </div>
        </div>
    </div>
</section>
