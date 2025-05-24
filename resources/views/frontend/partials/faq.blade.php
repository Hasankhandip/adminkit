 <section class="faq-section padding-top padding-bottom">
     <div class="container">
         <div class="section-header">
             <h2 class="title">{{ $faqContent->title }}</h2>
             <p></p>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="faq-wrapper style-two">
                     @foreach ($faqItemContent as $faqItem)
                         <div class="faq-item">
                             <div class="faq-title">
                                 <h6 class="title">{{ $faqItem->title }}</h6>
                                 <div class="right-icon"></div>
                             </div>
                             <div class="faq-content">
                                 <p>
                                     {{ $faqItem->description }}
                                 </p>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </section>
