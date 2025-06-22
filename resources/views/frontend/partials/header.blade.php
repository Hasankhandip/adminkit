  <header class="header">
      <div class="header-bottom">
          <div class="container">
              <div class="header-bottom-area">
                  <div class="logo">
                      <a href="{{ route('index') }}">
                          <img src="https://script.viserlab.com/binaryecom/assets/images/logoIcon/logo_dark.png"
                              alt="logo" />
                      </a>
                  </div>
                  <div class="header-trigger-wrapper d-flex d-lg-none align-items-center">
                      <div class="header-trigger d-block d-lg-none">
                          <span></span>
                      </div>
                      <div class="account-cart-wrapper">
                          <a class="account" href="https://script.viserlab.com/binaryecom/user/login"><i
                                  class="las la-user"></i></a>
                      </div>
                  </div>

                  <ul class="menu">
                      <li><a href="{{ route('index') }}">@lang('Home')</a></li>
                      <li>
                          <a href="{{ route('product.index') }}">@lang('Product')</a>
                      </li>

                      <li>
                          <a href="{{ route('faq.index') }}">@lang('Faq')</a>
                      </li>
                      <li>
                          <a href="{{ route('blog.index') }}">@lang('Blog')</a>
                      </li>
                      <li>
                          <a href="{{ route('contact.index') }}">@lang('Contact')</a>
                      </li>

                      <li>
                          <div class="custom--dropdown">
                              <div class="custom--dropdown__selected dropdown-list__item">
                                  <div class="thumb">
                                      <img src="https://script.viserlab.com/binaryecom/assets/images/language/668e57c2cdbb11720604610.png"
                                          alt="image" />
                                  </div>
                                  <span class="text"> @lang('English') </span>
                              </div>
                              <ul class="dropdown-list">
                                  <li class="dropdown-list__item" data-value="en">
                                      <a class="thumb" href="#">
                                          <img src="https://script.viserlab.com/binaryecom/assets/images/language/668e57c2cdbb11720604610.png"
                                              alt="image" />
                                          <span class="text"> @lang('English') </span>
                                      </a>
                                  </li>
                                  <li class="dropdown-list__item" data-value="en">
                                      <a class="thumb" href="#">
                                          <img src="https://script.viserlab.com/binaryecom/assets/images/language/668e57ceca4691720604622.png"
                                              alt="image" />
                                          <span class="text"> @lang('Bangla') </span>
                                      </a>
                                  </li>
                                  <li class="dropdown-list__item" data-value="en">
                                      <a class="thumb" href="#">
                                          <img src="https://script.viserlab.com/binaryecom/assets/images/language/668e57e022e811720604640.png"
                                              alt="image" />
                                          <span class="text"> @lang('Turkish') </span>
                                      </a>
                                  </li>
                                  <li class="dropdown-list__item" data-value="en">
                                      <a class="thumb" href="#">
                                          <img src="https://script.viserlab.com/binaryecom/assets/images/language/668e57f0d16551720604656.png"
                                              alt="image" />
                                          <span class="text"> @lang('Spanish') </span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>

                      <li class="account-cart-wrapper d-none d-lg-block">
                          <a class="account" href="{{ route('login.index') }}"><i class="las la-user"></i></a>
                      </li>
                  </ul>
                  <!-- Menu End -->
              </div>
          </div>
      </div>
  </header>
