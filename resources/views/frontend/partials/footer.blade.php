@php
    $footerContent = App\Models\Frontend\FrontendFooter::first();
    $footerContactContents = App\Models\Frontend\FrontendFooterContact::first();
    $footerSocial = App\Models\Frontend\FrontendFooterSocial::first();
@endphp

<footer class="footer-section">
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div class="col-lg-4 col-xl-3 col-sm-6">
                    <div class="footer-widget p-0">
                        <div class="logo">
                            <a href="{{ route($footerContent->link) }}"><img
                                    src="{{ getImage('frontend/footer/image/', $footerContent->image) }}"
                                    alt="logo" /></a>
                        </div>
                        <p>
                            {{ __($footerContent->title) }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-3 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">@lang('Quick Links')</h4>
                        <ul class="footer-links">
                            <li>
                                <a href="{{ route('index') }}"><i
                                        class="las la-angle-double-right"></i>@lang('Home')</a>
                            </li>
                            <li>
                                <a href="{{ route('product.index') }}"><i
                                        class="las la-angle-double-right"></i>@lang('Products')</a>
                            </li>
                            <li>
                                <a href="{{ route('blog.index') }}"><i
                                        class="las la-angle-double-right"></i>@lang('Blog')</a>
                            </li>
                            <li>
                                <a href="{{ route('contact.index') }}"><i
                                        class="las la-angle-double-right"></i>@lang('Contact')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-3 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">@lang('Policy Links')</h4>
                        <ul class="footer-links">
                            <li>
                                <a href="#"><i class="las la-angle-double-right"></i>@lang('Privacy and
                                                                    Policies')</a>
                            </li>
                            <li>
                                <a href="#"><i class="las la-angle-double-right"></i>@lang('Terms and
                                                                    Condition')</a>
                            </li>
                            <li>
                                <a href="#"><i class="las la-angle-double-right"></i>@lang('Refund Policy')</a>
                            </li>
                            <li>
                                <a href="#"><i class="las la-angle-double-right"></i>@lang('Commission
                                                                    Policy')</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">@lang('Contact')</h4>
                        <ul class="footer-info">
                            <li>
                                <p>
                                    <i class="las la-map-marker"></i>{{ __($footerContactContents->address) }}
                                </p>
                            </li>
                            <li>
                                <a href="tel:+01234567890"><i
                                        class="las la-phone-volume"></i>{{ __($footerContactContents->phone) }}</a>
                            </li>
                            <li>
                                <a href="#"><i class="las la-envelope"></i><span
                                        class="__cf_email__">{{ __($footerContactContents->email) }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-wrapper">
                <p class="copy-text">
                    &copy; @lang('All Right Reserved By')
                    <a href="{{ route('index') }}">@lang('BinaryEcom')</a>
                </p>
                <ul class="social-icons">
                    <li>
                        <a href="{{ $footerSocial->telegram_link }}" title="telegram" target="_blank">
                            <i class="lab la-telegram-plane"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $footerSocial->youtube_link }}" title="youtube" target="_blank">
                            <i class="lab la-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $footerSocial->twitter_link }}" title="twitter" target="_blank">
                            <i class="lab la-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $footerSocial->facebook_link }}" title="Facebook" target="_blank">
                            <i class="lab la-facebook"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
