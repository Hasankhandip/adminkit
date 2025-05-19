 <section class="service-section padding-bottom pos-rel">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-8 col-md-10">
                 <div class="section-header text-center">
                     <span class="subtitle">{{ __($serviceContent->subtitle) }}</span>
                     <h2 class="title">{{ __($serviceContent->title) }}</h2>
                 </div>
             </div>
         </div>
         <div class="row gy-4 justify-content-center">
             @foreach ($serviceItemContents as $serviceItem)
                 <div class="col-lg-4 col-md-6 col-sm-10">
                     <div class="service-item">
                         <div class="service-icon">
                             <i class="{{ @$serviceItem->icon }}"></i>
                         </div>
                         <div class="service-content">
                             <h4 class="title">{{ __(@$serviceItem->title) }}</h4>
                             <p class="description">
                                 {{ __(@$serviceItem->description) }}
                             </p>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>
