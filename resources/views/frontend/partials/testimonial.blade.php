  <section class="testimonial-section padding-bottom pos-rel">
      <div class="container">
          <div class="testimonial-wrapper row">
              <div class="col-lg-6">
                  <div class="section-header">
                      <span class="subtitle">{{ $testimonialContent->subtitle }}</span>
                      <h2 class="title">{{ $testimonialContent->title }}</h2>
                  </div>
                  <div class="testimonial-slider owl-carousel owl-theme" data-slider-id="1">
                      @foreach ($testimonialClientContents as $TestimonialClient)
                          <div class="testimonial-item">
                              <div class="quote-icon">
                                  <i class="flaticon-left-quote"></i>
                              </div>
                              <p>{{ $TestimonialClient->description }}</p>
                              <div class="thumb">
                                  <img src="{{ asset('assets/images/frontend/testimonial/item/images/' . $TestimonialClient->image) }}"
                                      alt="testimonials" />
                              </div>
                              <h4 class="name">{{ $TestimonialClient->name }}</h4>
                              <span class="designation">{{ $TestimonialClient->designation }}</span>
                          </div>
                      @endforeach

                  </div>
              </div>
              <div class="col-lg-6 d-none d-lg-block">
                  <div class="owl-thumbs testimonial-img-slider" data-slider-id="1">
                      <div class="owl-thumb-item">
                          <div class="thumb thumb0">
                              <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/testimonial/61adba0eeecac1638775310.jpg"
                                  alt="testimonials" />
                          </div>
                      </div>
                      <div class="owl-thumb-item">
                          <div class="thumb thumb1">
                              <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/testimonial/61acaae97f4651638705897.jpg"
                                  alt="testimonials" />
                          </div>
                      </div>
                      <div class="owl-thumb-item">
                          <div class="thumb thumb2">
                              <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/testimonial/61acaad39182b1638705875.jpg"
                                  alt="testimonials" />
                          </div>
                      </div>
                      <div class="owl-thumb-item">
                          <div class="thumb thumb3">
                              <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/testimonial/61acaac1510b51638705857.jpg"
                                  alt="testimonials" />
                          </div>
                      </div>
                      <div class="owl-thumb-item">
                          <div class="thumb thumb4">
                              <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/testimonial/61acaaa8bafba1638705832.jpg"
                                  alt="testimonials" />
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="shape shape1">
          <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/blob.png"
              alt="shape" />
      </div>
      <div class="shape shape2">
          <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/icon/quote.png"
              alt="icon" />
      </div>
  </section>
