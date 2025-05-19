        <section class="referral-section"
            style="
          background: url(https://script.viserlab.com/binaryecom/assets/images/frontend/refer/617406882b7241634993800.jpg)
            center;
        ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="refer-content">
                            <h2 class="title">
                                {{ __($refferContent->title) }}
                            </h2>
                            <p>
                                {{ __($refferContent->description) }}
                            </p>
                            <a class="cmn--btn active"
                                href="{{ $refferContent->button_link }}"><span>{{ $refferContent->button_name }}</span></a>
                            <div class="shape shape1">
                                <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/icon/gft.png"
                                    alt="icon" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="refer-thumb">
                            <img src="{{ asset('assets/images/frontend/reffer/image/' . $refferContent->image) }}"
                                alt="thumb" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
