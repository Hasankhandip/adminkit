  <section class="product-details padding-top padding-bottom pos-rel">
      <div class="container">
          <div class="row gy-4 gy-sm-5">
              <div class="col-lg-5">
                  <div class="product-thumb-wrapper">
                      <div class="sync1 owl-carousel owl-theme">
                          @foreach ($product->productImages as $productImage)
                              <div class="thumbs">
                                  <img class="zoom_img" src="{{ getImage('product/image/', $productImage->image) }}"
                                      alt="products-details" />
                              </div>
                          @endforeach
                      </div>
                      <div class="sync2 owl-carousel owl-theme mt-2">
                          @foreach ($product->productImages as $productImage)
                              <div class="thumbs">
                                  <img class="zoom_img" src="{{ getImage('product/image/', $productImage->image) }}"
                                      alt="products-details" />
                              </div>
                          @endforeach
                      </div>
                  </div>
              </div>
              <div class="col-lg-7">
                  <div class="product-info-wrapper">
                      <h3 class="title">
                          {{ __($product->name) }}
                      </h3>
                      <div class="product-price">
                          <span class="current-price"> {{ __($product->price) }}</span>
                      </div>
                      @if ($product->stock)
                          <span class="custom--badge bg--success mt-3">@lang('In Stock')</span>
                      @else
                          <span class="custom--badge bg--success mt-3">@lang('out of stock')</span>
                      @endif
                      <div class="add-cart-wrapper">
                          <div class="cart-plus-minus">
                              <div class="cart-decrease qtybutton dec">
                                  <i class="las la-minus"></i>
                              </div>
                              <input class="cart-count" type="text" value="1" readonly />
                              <div class="cart-increase qtybutton inc active">
                                  <i class="las la-plus"></i>
                              </div>
                          </div>
                          <a class="cart--btn cmn--btn-2 bg--primary purchaseBtn" data-id="11"
                              data-name="MeeTion MT-HP010 Scalable Noise-canceling Stereo Leather Wired Gaming Headset"
                              href="javascript:void(0)">@lang('Purchase Now')</a>
                      </div>
                      <ul class="product-meta">
                          <li class="meta-item">
                              <h6 class="title">@lang('Category :')</h6>
                              <a href="#">
                                  {{ __($product->category->name) }}
                              </a>
                          </li>
                          <li class="meta-item">
                              <h6 class="title">@lang('Brand :')</h6>
                              <div>
                                  <a href="#0"> {{ __($product->brand->name) }}</a>
                              </div>
                          </li>
                      </ul>

                  </div>
              </div>
          </div>
      </div>
      <div class="shape shape1">
          <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/blob1.png"
              alt="shape" />
      </div>
  </section>

  <div class="product-details section-bg pb-80">
      <div class="container">
          <div class="product-details-wrapper">
              <div class="description">
                  <h3 class="mb-3">@lang('Description')</h3>
                  <div>
                      {{ __($product->description) }}
                  </div>
              </div>

              <div class="mt-5">
                  <div class="blog-details__share d-flex align-items-center flex-wrap">
                      <ul class="social-list">
                          <li class="social-list__item">
                              <b>@lang('Share Now :')</b>
                          </li>
                          <li class="social-list__item">
                              <a class="social-list__link flex-center facebook" href="#" target="_blank">
                                  <i class="fab fa-facebook-f"></i>
                              </a>
                          </li>
                          <li class="social-list__item">
                              <a class="social-list__link flex-center twitter" href="#" target="_blank">
                                  <i class="fab fa-twitter"></i>
                              </a>
                          </li>
                          <li class="social-list__item">
                              <a class="social-list__link flex-center linkedin" href="#" target="_blank">
                                  <i class="fab fa-linkedin-in"></i>
                              </a>
                          </li>
                          <li class="social-list__item">
                              <a class="social-list__link flex-center instagram" href="#" target="_blank">
                                  <i class="fab fa-instagram"></i>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <section class="product-section padding-top padding-bottom">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8 col-md-10">
                  <div class="section-header text-center">
                      <h2 class="title">@lang('Related Products')</h2>
                  </div>
              </div>
          </div>
          <div class="product-slider owl-carousel owl-theme owl-loaded owl-drag">
              @foreach ($products as $relatedProduct)
                  <div class="owl-ite">
                      <div class="product-item h-100">
                          <div class="product-thumb">
                              <img src="{{ getImage('product/thumb/', $relatedProduct->thumbnail) }}" alt="products" />
                              <ul class="product-options">
                                  <li>
                                      <a class="image"
                                          href="{{ getImage('product/thumb/', $relatedProduct->thumbnail) }}"><i
                                              class="las la-expand"></i></a>
                                  </li>
                              </ul>
                          </div>
                          <div class="product-content">
                              <h6 class="product-title">
                                  <a
                                      href="{{ route('product.details', $relatedProduct->id) }}">{{ __($relatedProduct->name) }}</a>
                              </h6>
                              @if ($relatedProduct->stock)
                                  <span class="product-availablity text--success">@lang('in stock')</span>
                              @else
                                  <span class="product-availablity text--danger">@lang('out of stock')</span>
                              @endif
                              <div class="product-price">
                                  <span class="current-price">${{ printNumber(__($relatedProduct->price)) }}</span>
                              </div>
                              <a class="add-to-cart cmn--btn-2"
                                  href="{{ route('product.details', $relatedProduct->id) }}">@lang('Details')</a>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </section>
