@extends('frontend.layouts.app')
@section('content')
    @include('frontend.partials.breadcumb')
    <section class="cart-container container ">
        <h1 class="heading">
            <ion-icon name="cart-outline"></ion-icon> @lang('Shopping Cart')
        </h1>

        <div class="item-flex">

            <section class="checkout">
                <h2 class="section-heading">@lang('Payment Details')</h2>

                <div class="payment-form">

                    <form action="#">

                        <div class="cardholder-name">
                            <label for="cardholder-name" class="label-default">@lang('Cardholder Name')</label>
                            <input type="text" id="cardholder-name" class="input-default" name="cardholder-name">
                        </div>

                        <div class="card-number">
                            <label for="card-number" class="label-default">@lang('Card Number')</label>
                            <input type="number" id="card-number" class="input-default" name="card-number">
                        </div>

                        <div class="input-flex">
                            <div class="expire-date">
                                <label for="expire-date" class="label-default">@lang('Expiration Date')</label>

                                <div class="input-flex">
                                    <input type="number" name="day" id="expire-date" class="input-default"
                                        placeholder="31" min="1" max="31">
                                    /
                                    <input type="number" name="month" id="expire-date" class="input-default"
                                        placeholder="12" min="1" max="12">
                                </div>
                            </div>

                            <div class="cvv">
                                <label for="cvv" class="label-default">@lang('CVV')</label>
                                <input type="number" id="cvv" class="input-default" name="cvv">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="btn-wrapper">
                    <button class="btn btn-primary"><b>@lang('Pay')</b><span id="payAmount">
                            {{ __(printAmount($totalWithTax)) }}</span></button>
                </div>
            </section>

            <section class="cart">
                <div class="cart-item-box">
                    <h2 class="section-heading">@lang('Order Summary')</h2>
                    <div class="cart-item-box-wrapper">
                        @forelse ($cartContents as $cartContent)
                            <div class="product-card" data-id="{{ $cartContent->id }}">

                                <div class="card">
                                    <div class="img-box">
                                        <img src="{{ getImage('product/thumb', $cartContent->attributes->thumbnail) }}"
                                            width="80px" class="product-img">
                                    </div>

                                    <div class="detail">

                                        <h4 class="product-name">{{ __($cartContent->name) }}</h4>

                                        <div class="wrapper">

                                            <div class="product-qty">
                                                <button id="decrement">
                                                    <i class="las la-minus"></i>
                                                </button>

                                                <span id="quantity">{{ __($cartContent->quantity) }}</span>

                                                <button id="increment">
                                                    <i class="las la-plus"></i>
                                                </button>
                                            </div>

                                            <div class="price">
                                                <span id="price"> {{ __(printAmount($cartContent->price)) }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="product-close-btn" data-id="{{ $cartContent->id }}">
                                        <ion-icon name="close-outline"></ion-icon>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <p>@lang('Your cart is empty.')</p>
                        @endforelse
                    </div>
                </div>

                <div class="wrapper">

                    <div class="amount">
                        <div class="subtotal">
                            <span>@lang('Subtotal')</span> <span id="subtotal">
                                {{ __(printAmount($subTotal)) }} </span>
                        </div>

                        <div class="tax">
                            <span>@lang('Tax')</span> <span id="tax"> {{ __(printAmount($taxAmount)) }}</span>
                        </div>

                        <div class="total">
                            <span>@lang('Total')</span> <span id="total">{{ __(printAmount($totalWithTax)) }}</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection


@push('js')
    <script>
        document.querySelectorAll('.product-close-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const productId = this.dataset.id;
                const productCard = this.closest('.product-card');

                fetch("{{ route('cart.remove') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id: productId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            productCard.remove();

                            $('.cart_count_wrapper').find('.cart_count').text(data.cart_count);
                            document.getElementById('subtotal').textContent = data.subtotal;
                            document.querySelector('.tax span:last-child').textContent = data.tax;
                            document.querySelector('.total span:last-child').textContent = data.total;
                            document.querySelector('.btn-primary span').textContent = data.total;

                            if (data.cart_count === 0) {
                                document.querySelector('.cart-item-box-wrapper').innerHTML =
                                    '<p>Your cart is empty.</p>';
                            }
                        }
                    });
            });
        });
    </script>
@endpush
