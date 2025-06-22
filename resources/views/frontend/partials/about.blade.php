@php
    $aboutContent = App\Models\Frontend\FrontendAbout::first();
@endphp

<section class="about-section padding-top padding-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="about-thumb rtl">
                    <img src="{{ getImage('frontend/about/image/', $aboutContent->image) }}" class="w-100" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-header">
                        <span class="subtitle">{{ __($aboutContent->title) }}</span>
                        <h2 class="title">
                            {{ __($aboutContent->subtitle) }}
                        </h2>
                        <p>
                            {{ __($aboutContent->description) }}
                        </p>
                    </div>
                    <a href="{{ $aboutContent->button_link_one }}" class="cmn--btn active">
                        <span> {{ __($aboutContent->button_name_one) }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="shape shape1">
        <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/circle-triangle.png"
            alt="shape" />
    </div>
    <div class="shape shape2">
        <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/circle-big.png"
            alt="shape" />
    </div>
</section>
