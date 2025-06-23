  <section class="contact-section padding-top padding-bottom">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                  <div class="contact-thumb rtl">
                      <img src="{{ getImage('contact/thumb/', $contactContent->image) }}" />
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="contact-form-wrapper">
                      <h3 class="title">
                          {{ __($contactContent->title) }}
                      </h3>
                      <form class="contact-form verify-gcaptcha" method="post">
                          <input type="hidden" name="_token" value="" autocomplete="off" />
                          <div class="form--group">
                              <label class="form--label">@lang('Name')</label>
                              <input class="form--control" name="name" type="text" value=""
                                  placeholder="@lang('Enter Your Full Name')" required />
                          </div>
                          <div class="form--group">
                              <label class="form--label">@lang('Email Address')</label>
                              <input class="form--control" name="email" type="email" value=""
                                  placeholder="@lang('Enter Your Email Address')" required />
                          </div>
                          <div class="form--group">
                              <label class="form--label">@lang('Subject')</label>
                              <input class="form--control" name="subject" type="text" value=""
                                  placeholder="@lang('Enter Your Subject')" required />
                          </div>
                          <div class="form--group">
                              <label class="form--label" for="msg">@lang('Your Message')</label>
                              <textarea class="form--control" id="msg" name="message" placeholder="@lang('Enter Your Message')" required></textarea>
                          </div>
                          <div class="mb-3">
                              <script src="https://www.google.com/recaptcha/api.js"></script>
                              <div class="g-recaptcha" data-sitekey="6LdPC88fAAAAADQlUf_DV6Hrvgm-pZuLJFSLDOWV"
                                  data-callback="verifyCaptcha"></div>
                              <div id="g-recaptcha-error"></div>
                          </div>
                          <div class="form--group">
                              <button class="btn btn--base w-100" type="submit">
                                  @lang('Send Us Message')
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="contact-info padding-bottom">
      <div class="shape shape1">
          <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/all-shape.png"
              alt="shape" />
      </div>
      <div class="container">
          <div class="row gy-5 justify-content-center">
              <div class="col-lg-6 col-xl-5">
                  <div class="contact-info-wrapper row gy-4 justify-content-center">
                      <div class="col-lg-12 col-md-6 col-sm-10">
                          <div class="contact-info-item">
                              <div class="thumb">
                                  <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/contact_us/61ade0aa711791638785194.png"
                                      alt="icon" />
                              </div>
                              <div class="content">
                                  <h5 class="title">@lang('Email Address :')</h5>
                                  <span><a href="{{ __($contactitemContent->email_link) }}" class="__cf_email__"
                                          data-cfemail="a0d3d5d0d0cfd2d4e0c2c9cec1d2d9c5c3cfcd8ec3cfcd">{{ __($contactitemContent->email_name) }}</a></span>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-6 col-sm-10">
                          <div class="contact-info-item">
                              <div class="thumb">
                                  <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/contact_us/61ade0923dcb31638785170.png"
                                      alt="icon" />
                              </div>
                              <div class="content">
                                  <h5 class="title">@lang('Phone Number :')</h5>
                                  <span>{{ __($contactitemContent->phone_number) }}</span>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-6 col-sm-10">
                          <div class="contact-info-item">
                              <div class="thumb">
                                  <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/contact_us/61ade081dce571638785153.png"
                                      alt="icon" />
                              </div>
                              <div class="content">
                                  <h5 class="title">@lang('Company Location :')</h5>
                                  <span>{{ __($contactitemContent->address) }}</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-xl-7">
                  <div class="map-wrapper">
                      <iframe class="map" src="{{ $contactitemContent->map_link }}"></iframe>
                  </div>
              </div>
          </div>
      </div>
  </section>
