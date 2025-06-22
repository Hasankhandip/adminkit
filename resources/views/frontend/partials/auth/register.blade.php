  <section class="account-section">
      <div class="row g-0">
          <div class="col-md-6 col-xl-7 col-lg-6">
              <div class="account-thumb">
                  <img src="{{ asset('assets/images/register/thumb/' . $registerContent->thumb) }}" alt="thumb" />
                  <div class="account-thumb-content">
                      <p class="welc">{{ $registerContent->subtitle }}</p>
                      <h3 class="title">{{ $registerContent->title }}</h3>
                      <p class="info">
                          {{ $registerContent->info }}
                      </p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-5 col-lg-6">
              <div class="account-form-wrapper">
                  <div class="logo">
                      <a href="{{ route('index') }}"><img
                              src="https://script.viserlab.com/binaryecom/assets/images/logoIcon/logo.png"
                              alt="logo" /></a>
                  </div>
                  <form class="account-form verify-gcaptcha disableSubmission" action="{{ route('register.store') }}"
                      method="POST">
                      @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form--group">
                                  <label class="form--label">@lang('Referral Username')</label>
                                  <input class="referral form-control form--control" name="referBy" type="text"
                                      placeholder="Enter referral username" required />
                                  <div id="ref"></div>
                                  <span id="referral"></span>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form--group">
                                  <label class="form--label">@lang('Position')</label>
                                  <select class="position form--control form-select select2" id="position"
                                      name="position" required data-minimum-results-for-search="-1">
                                      <option value="" selected disabled>
                                          @lang('Select position')
                                      </option>
                                      <option value="1">@lang('Left')</option>
                                      <option value="2">@lang('Right')</option>
                                  </select>
                                  <span id="position-test"><span class="text--danger"></span></span>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form--group">
                                  <label class="form--label">@lang('First Name')</label>
                                  <input class="form-control form--control" name="firstname" type="text"
                                      value="" required placeholder="Enter Your First Name" />
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form--group">
                                  <label class="form--label">@lang('Last Name')</label>
                                  <input class="form-control form--control" name="lastname" type="text"
                                      value="" required placeholder="Enter Your Last Name" />
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-lg-12">
                              <div class="form--group">
                                  <label class="form--label">@lang('Email')</label>
                                  <input class="form-control form--control checkUser" name="email" type="email"
                                      required placeholder="Enter Your Email" />
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form--group hover-input-popup">
                                  <label class="form--label">@lang('Password')</label>
                                  <input class="form-control form--control" name="password" type="password" required
                                      placeholder="Enter Password" />
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form--group">
                                  <label class="form--label">@lang('Re-Password')</label>
                                  <input class="form-control form--control" name="password_confirmation" type="password"
                                      required placeholder="Confirm Password" />
                              </div>
                          </div>
                      </div>

                      <div class="mb-3">
                          <script src="https://www.google.com/recaptcha/api.js"></script>
                          <div class="g-recaptcha" data-sitekey="6LdPC88fAAAAADQlUf_DV6Hrvgm-pZuLJFSLDOWV"
                              data-callback="verifyCaptcha"></div>
                          <div id="g-recaptcha-error"></div>
                      </div>

                      <div class="form-group">
                          <input id="agree" name="agree" type="checkbox" required />
                          <label for="agree">@lang('I agree with')</label>
                          <a class="text-primary"
                              href="https://script.viserlab.com/binaryecom/policy/privacy-and-policies"
                              target="_blank">@lang('Privacy and Policies')</a>
                          ,
                          <a class="text-primary"
                              href="https://script.viserlab.com/binaryecom/policy/terms-and-condition"
                              target="_blank">@lang('Terms and Condition')</a>
                          ,
                          <a class="text-primary" href="https://script.viserlab.com/binaryecom/policy/refund-policy"
                              target="_blank">@lang('Refund Policy')</a>
                          ,
                          <a class="text-primary"
                              href="https://script.viserlab.com/binaryecom/policy/commission-policy"
                              target="_blank">@lang('Commission Policy')</a>
                      </div>

                      <div class="form--group button-wrapper">
                          <button class="account--btn" type="submit">
                              @lang('Create Account')
                          </button>
                          <a class="custom--btn" href="{{ route('login.index') }}"><span>@lang('Login
                                  Account')</span></a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="shape shape3">
          <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/08.png"
              alt="shape" />
      </div>
      <div class="shape shape4">
          <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/waves.png"
              alt="shape" />
      </div>
  </section>
