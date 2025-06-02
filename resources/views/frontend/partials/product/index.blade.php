  <section class="product-section padding-top padding-bottom mb-5">
      <div class="container">
          <ul class="mr-list justify-content-center">
              <li class="mr-list__item">
                  <a class="mr-list__btn active" href="#">All Products</a>
              </li>
              <li class="mr-list__item">
                  <a class="mr-list__btn" href="#">Mens Fashion</a>
              </li>
              <li class="mr-list__item">
                  <a class="mr-list__btn" href="#">Womens Fashion</a>
              </li>
              <li class="mr-list__item">
                  <a class="mr-list__btn" href="#">Sports &amp;
                      Outdor</a>
              </li>
              <li class="mr-list__item">
                  <a class="mr-list__btn" href="#">Automobile</a>
              </li>
              <li class="mr-list__item">
                  <a class="mr-list__btn" href="#">Home &amp; Audio</a>
              </li>
          </ul>
          <div class="row g-3 justify-content-center">
              @foreach ($products as $product)
                  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                      <div class="product-item h-100">
                          <div class="product-thumb">
                              <img src="{{ asset('assets/images/product/thumb/' . $product->thumbnail) }}"
                                  alt="products" />
                              <ul class="product-options">
                                  <li>
                                      <a class="image"
                                          href="{{ asset('assets/images/product/thumb/' . $product->thumbnail) }}"><i
                                              class="las la-expand"></i>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                          <div class="product-content">
                              <h6 class="product-title">
                                  <a href="{{ route('product.details') }}">{{ $product->name }}</a>
                              </h6>

                              <span class="product-availablity  ">
                                  @if ($product->stock)
                                      <span class="text-success">
                                          @lang('In Stock')
                                      </span>
                                  @else
                                      <span class="text-danger">
                                          @lang('Out of Stock')
                                      </span>
                                  @endif
                              </span>

                              <div class="product-price">
                                  <span class="current-price">${{ $product->price }}</span>
                              </div>
                              <a class="add-to-cart cmn--btn-2" href="{{ route('product.details') }}">Details</a>
                          </div>
                      </div>
                  </div>
              @endforeach

          </div>
      </div>
  </section>
