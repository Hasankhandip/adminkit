@foreach ($products as $product)
    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
        <div class="product-item h-100">
            <div class="product-thumb">
                <img src="{{ getImage('product/thumb/', $product->thumbnail) }}" alt="products" />
                <ul class="product-options">
                    <li>
                        <a class="image" href="{{ getImage('product/thumb/', $product->thumbnail) }}"><i
                                class="las la-expand"></i></a>
                    </li>
                </ul>
            </div>
            <div class="product-content">
                <h6 class="product-title">
                    <a href="{{ route('product.details') }}">{{ __($product->name) }}</a>
                </h6>
                @if ($product->stock)
                    <span class="product-availablity text--success">@lang('in stock')</span>
                @else
                    <span class="product-availablity text--danger">@lang('out of stock')</span>
                @endif
                <div class="product-price">
                    <span class="current-price">${{ printNumber(__($product->price)) }}</span>
                </div>
                <a class="add-to-cart cmn--btn-2" href="{{ route('product.details') }}">@lang('Details')</a>
            </div>
        </div>
    </div>
@endforeach
