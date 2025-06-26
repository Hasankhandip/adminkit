@extends('frontend.layouts.app')
@section('content')
    @include('frontend.partials.breadcumb')
    <section class="cart-container container">
        <h1 class="heading">
            <ion-icon name="cart-outline"></ion-icon> Shopping Cart
        </h1>

        <div class="item-flex">

            <section class="checkout">
                <h2 class="section-heading">Payment Details</h2>

                <div class="payment-form">

                    <form action="#">

                        <div class="cardholder-name">
                            <label for="cardholder-name" class="label-default">Cardholder Name</label>
                            <input type="text" id="cardholder-name" class="input-default" name="cardholder-name">
                        </div>

                        <div class="card-number">
                            <label for="card-number" class="label-default">Card Number</label>
                            <input type="number" id="card-number" class="input-default" name="card-number">
                        </div>

                        <div class="input-flex">
                            <div class="expire-date">
                                <label for="expire-date" class="label-default">Expiration Date</label>

                                <div class="input-flex">
                                    <input type="number" name="day" id="expire-date" class="input-default"
                                        placeholder="31" min="1" max="31">
                                    /
                                    <input type="number" name="month" id="expire-date" class="input-default"
                                        placeholder="12" min="1" max="12">
                                </div>
                            </div>

                            <div class="cvv">
                                <label for="cvv" class="label-default">CVV</label>
                                <input type="number" id="cvv" class="input-default" name="cvv">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="btn-wrapper">
                    <button class="btn btn-primary"><b>Pay</b><span> {{ __(printAmount($totalWithTax)) }}</span></button>
                </div>
            </section>

            <section class="cart">
                <div class="cart-item-box">
                    <h2 class="section-heading">Order Summary</h2>
                    @foreach ($cartContents as $cartContent)
                        <div class="product-card">

                            <div class="card">
                                <div class="img-box">
                                    <img src="https://i.postimg.cc/HW0XQWfW/green-tomatoes.jpg" alt="green-tomatoes"
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

                                <button class="product-close-btn">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="wrapper">

                    <div class="amount">
                        <div class="subtotal">
                            <span>Subtotal</span> <span id="subtotal">
                                {{ __(printAmount($subTotal)) }} </span>
                        </div>

                        <div class="tax">
                            <span>Tax</span> <span> {{ __(printAmount($taxAmount)) }}</span>
                        </div>

                        <div class="total">
                            <span>Total</span> <span> {{ __(printAmount($totalWithTax)) }}</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
