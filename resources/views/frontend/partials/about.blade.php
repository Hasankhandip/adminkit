 <section class="about-section padding-top padding-bottom">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-6 d-none d-lg-block">
                 <div class="about-thumb rtl">
                     <img src="{{ asset('assets/images/frontend/about/image/' . $aboutContents->image) }}" alt="thumb"
                         class="w-100" />
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="about-content">
                     <div class="section-header">
                         <span class="subtitle">{{ __($aboutContents->subtitle) }}</span>
                         <h2 class="title">
                             {{ __($aboutContents->title) }}
                         </h2>
                         <p>
                             {{ __($aboutContents->description) }}
                         </p>
                     </div>

                     <a href="{{ route($aboutContents->button_link_1) }}" class="cmn--btn active"><span>
                             {{ __($aboutContents->button_name_1) }}</span></a>
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
